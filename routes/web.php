<?php

use App\Http\Controllers\CartController;
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

Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');

Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
Route::post('/cart', [CartController::class, 'store'])->name('carts.store');

Route::get('/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::get('/admin', [UserController::class, 'admin'])->name('users.admin')->middleware('admin');


#Сделал - Кирилл. Роуты на регистрацию
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'create_login'])->name('login');
Route::post('/login', [AuthController::class, 'store_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


