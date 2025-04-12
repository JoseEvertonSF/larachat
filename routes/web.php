<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register/create', [UserController::class, 'create'])->name('register_create');

Route::get('/create/chat/{idUser}', [ChatController::class, 'createChat'])->name('create.chat')->middleware('auth');
Route::get('/chat/{idChat}', [ChatController::class, 'chat'])->name('chat')->middleware('auth');
Route::post('/chat/send-message', [ChatController::class, 'store'])->name('send-message')->middleware('auth');
Route::post('/chat/message/update-read', [ChatController::class, 'updateReadMessage'])->name('update-read')->middleware('auth');



