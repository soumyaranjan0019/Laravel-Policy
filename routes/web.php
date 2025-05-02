<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::view('register', 'register')->name('register');
Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');

// Route::get('/', [UserController::class, 'loginPage'])->name('home');
Route::view('login', 'login')->name('login');

Route::post('/login', [UserController::class, 'login'])->name('loginMatch');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('books', BookController::class)->middleware('auth');
    