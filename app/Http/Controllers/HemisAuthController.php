<?php

namespace App\Http\Controllers;

use App\Events\UserInfoEvent;
use App\Models\User;
use App\Services\HemisOAuthClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HemisAuthController extends Controller
{
    public function __construct(private HemisOAuthClientService $service)
    {
    }
    public function redirectToHemis()
    {
        $authorizationUrl = $this->service->provider()->getAuthorizationUrl();
        session(['oauth2state' => $this->service->provider()->getState()]);
        Log::info('Redirecting to Hemis', [
            'authorization_url' => $authorizationUrl,
            'oauth2state' => session('oauth2state'),
        ]);
        return redirect()->away($authorizationUrl);
    }
    public function login(Request $request)
    {
        if ($request->state !== session('oauth2state')) {
            return abort(403, 'Invalid state');
        }
        try {
            $accessToken = $this->service->provider()->getAccessToken('authorization_code', [
                'code' => $request->code
            ]);

            $resourceOwner = $this->service->provider()->getResourceOwner($accessToken);
            $userData = $resourceOwner->toArray();
            if (!$userData) {
                return abort(500, 'Failed to retrieve user data from Hemis');
            }
            $employee = User::updateOrCreate(
                ['employee_id_number' => $userData['employee_id_number']],
                [
                    'name' => $userData['name'],
                    'email' => $userData['email'] ?? strtolower($userData['firstname']).$userData['employee_id'].'@gmail.com',
                    'first_name' => $userData['firstname'],
                    'last_name' => $userData['surname'],
                    'phone' => $userData['phone'] ?? null,
                    'uuid' => $userData['uuid'] ?? null,
                    'type' => $userData['type'] ?? null,
                    'password' => Hash::make($userData['employee_id_number']),
                ]
            );
            event(new UserInfoEvent($employee, $userData['departments'], $userData['picture_full']));
            Auth::login($employee, true);
            return redirect()->route('dashboard');
        }catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['error' => 'Failed to login with Hemis: ' . $e->getMessage()]);
        }
    }
}
