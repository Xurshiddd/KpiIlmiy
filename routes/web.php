<?php

use App\Http\Controllers\HemisAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('dashboard',[ProfileController::class, 'show'] )->name('dashboard');
Route::get('/hemis/redirect', [HemisAuthController::class, 'redirectToHemis'])->name('hemis.redirect');
Route::get('/hemis/callback', [HemisAuthController::class, 'login'])->name('hemis.callback');
