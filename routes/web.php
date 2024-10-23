<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[AuthController::class,'homePage'])->name('home');

Route::post('/signin',[LoginController::class,'login'])->name('signin');

Route::get('/dashboard', [AuthController::class, 'dBoard'])->name('dashboard');

Route::post('/registeration',[RegisterController::class, 'register'])->name('registeration');

Route::post('/logout', [LoginController::class, 'signout'])->name('logout');

Route::get('/reset',[AuthController::class,'resetPassword'])->name('reset');

Route::post('reset/{token}', [PasswordResetController::class, 'resetForm'])->name('password.update');

// Route::group(['middleware' => 'auth'], function () {
//     // Routes that require authentication
//     Route::post('/logout', [LoginController::class, 'signout'])->name('logout');
//     Route::post('/signin',[LoginController::class,'login'])->name('signin');
//     Route::post('/registeration',[RegisterController::class, 'register'])->name('registeration');

// });
