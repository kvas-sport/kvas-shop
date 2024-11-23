<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalog/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');

Route::get('/cart', function () {
   return view('cart.index');
});

#Сделал - Кирилл. Роуты на регистрацию
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'create_login'])->name('login');
Route::post('/login', [AuthController::class, 'store_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
