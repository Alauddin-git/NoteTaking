<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;


// user authentication
Route::group(['middleware' => 'guest'], function () {
    Route::view('/', 'auth.login');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('login.operation');
    Route::view('/register', 'auth.register');
    Route::post('/register', [AuthController::class, 'userRegistration'])->name('register.operation');
});

// user note
Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('note/list', [NoteController::class, 'noteList'])->name('note.list');
    Route::get('note/create', [NoteController::class, 'noteCreate'])->name('note.create');
    Route::post('note/add', [NoteController::class, 'notezInsert'])->name('note.add');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});
