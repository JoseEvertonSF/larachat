<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register/create', [UserController::class, 'create'])->name('register_create');