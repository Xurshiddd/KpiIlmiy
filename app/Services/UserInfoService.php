<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserInfoService
{
    public function updateUserInfo(User $user, array $data, string $imageUrl): void
{
    try {
    $departments = collect($data);
    $newCodes = $departments->pluck('department.code')->toArray();

    // Eski bo'limlarni o'chirish
    $user->infos()->whereNotIn('code', $newCodes)->delete();

    foreach ($departments as $item) {
        $department = $item['department'] ?? [];
        $employmentForm = $item['employmentForm'] ?? [];
        $employmentStaff = $item['employmentStaff'] ?? [];
        $staffPosition = $item['staffPosition'] ?? [];
        $employeeStatus = $item['employeeStatus'] ?? [];

        $user->infos()->updateOrCreate(
            ['code' => $department['code'] ?? null],
            [
                'name' => $department['name'] ?? null,
                'department_name' => $department['name'] ?? null,
                'employmentForm' => $employmentForm['name'] ?? null,
                'employmentStaff' => $employmentStaff['name'] ?? null,
                'staffPosition' => $staffPosition['name'] ?? null,
                'employeeStatus' => $employeeStatus['name'] ?? null,
            ]
        );
    }
    if (empty($user->avatar) || !Storage::disk('public')->exists($user->avatar)) {
        $imageContents = file_get_contents($imageUrl);

        $fileName = 'user_' . $user->id . '.jpg';
        $filePath = storage_path('app/public/users/' . $fileName);

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }

        file_put_contents($filePath, $imageContents);

        $user->update([
            'avatar' => 'users/' . $fileName,
        ]);
    }

} catch (\Exception $exception) {
    Log::error("UserId: {$user->id}. " . $exception->getMessage());
}

}

}
