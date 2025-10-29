<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        User::with(['tasks', 'infos'])->find($user->id);
        return view('dashboard');
    }
}
