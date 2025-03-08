<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register/create', [UserController::class, 'create'])->name('register_create');

Route::get('/chat/{idUser}', [ChatController::class, 'chat'])->name('chat')->middleware('auth');;
Route::post('/chat/send', [ChatController::class, 'store'])->name('send-message')->middleware('auth');;




