<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\SocialiteAuthController;


// Google and Github login
Route::get('auth/{provider}/redirect', [SocialiteAuthController::class, 'redirect'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialiteAuthController::class, 'callback'])->name('social.callback');

//simple login and register
Route::redirect('/', 'auth/login');
Route::get('/auth/login',[AuthController::class,'userLogin'])->name('userLogin');
Route::get('/auth/register',[AuthController::class,'userRegister'])->name('userRegister');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin routes
require __DIR__.'/admin.php';
// User routes
require __DIR__.'/customer.php';
