<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// user authentication
Route::group(['middleware' => 'guest'], function () {
    Route::view('/', 'auth.login');
    Route::view('/register', 'auth.register');
    Route::post('/register', [AuthController::class, 'userRegistration'])->name('register.operation');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('login.operation');
});

// user note

