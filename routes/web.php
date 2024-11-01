<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',[AuthController::class,'homePage'])->name('home');

Route::post('signin',[LoginController::class,'login'])->name('signin');

Route::get('dashboard', [AuthController::class, 'dBoard'])->name('dashboard');

Route::post('registeration',[RegisterController::class, 'register'])->name('registeration');

Route::post('logout', [LoginController::class, 'signout'])->name('logout');

Route::get('reset',[AuthController::class,'resetForm'])->name('reset');

Route::post('reset', [PasswordResetController::class, 'sendResetLink'])->name('password.update');

Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset.password');

Route::post('reset-password',[PasswordResetController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::get('book_form',[BookController::class,'addBook'])->name('book.create');

Route::post('book_form',[BookController::class,'createBook'])->name('book.upload');

Route::get('all_book',[BookController::class,'showAllBooks'])->name('book.all');

Route::get('book/{bookId}',[BookController::class,'showBook'])->name('book.show');

Route::get('edit_book/{id}', [BookController::class,'editBook'])->name('book.edit');

Route::post('edit_book/{id}',[BookController::class,'updateBook'])->name('book.update');

Route::delete('book/delete',[BookController::class,'deleteBook'])->name('book.delete');


// Route::group(['middleware' => 'auth'], function () {
//     // Routes that require authentication
//     Route::post('/logout', [LoginController::class, 'signout'])->name('logout');
//     Route::post('/signin',[LoginController::class,'login'])->name('signin');
//     Route::post('/registeration',[RegisterController::class, 'register'])->name('registeration');

// });
