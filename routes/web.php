<?php

use App\Http\Controllers\HemisAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('dashboard', function () {
    $user = auth()->user();
    return view('dashboard', compact('user'));
})->name('dashboard');
Route::get('/hemis/redirect', [HemisAuthController::class, 'redirectToHemis'])->name('hemis.redirect');
Route::get('/hemis/callback', [HemisAuthController::class, 'login'])->name('hemis.callback');
