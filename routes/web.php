<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // Import the RegisterController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// Default route
Route::get('/', function () {
    return redirect()->route('login');
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show the registration form
Route::post('/register', [RegisterController::class, 'register']); // Handle registration form submission

// News Route
Route::get('/news', [NewsController::class, 'fetchNews']);
