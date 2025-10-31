<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function show()
    {
        $u = auth()->user();
        $user = User::with(['tasks', 'infos', 'targetIndicators'])->find($u->id);
        // dd($user);
        return view('dashboard', compact('user'));
    }
}
