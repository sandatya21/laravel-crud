<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rute resource untuk produk
Route::resource('/products', \App\Http\Controllers\ProductController::class);

// Rute untuk menampilkan formulir login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk menangani proses login
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk menampilkan formulir register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rute untuk menangani proses register
Route::post('/register', [RegisterController::class, 'register']);

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
