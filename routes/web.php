<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [ProductController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);

#Сделал - Кирилл. Роуты на регистрацию
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'create_login'])->name('login');
Route::post('/login', [AuthController::class, 'store_login']);
  