<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::post('/checkLogin', [AuthController::class, 'CheckLogin'])->name('checkLogin');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/saveSettings', [HomeController::class, 'saveSettings'])->name('saveSettings');
    // Admin
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/RegisterUser', [AdminController::class, 'RegisterUser'])->name('RegisterUser');
    // Lab Coordinators
    Route::get('/labs', [CoordinatorController::class, 'labs'])->name('labs');
    Route::post('/RegisterLabs', [CoordinatorController::class, 'RegisterLabs'])->name('RegisterLabs');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});