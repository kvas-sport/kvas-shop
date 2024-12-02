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

Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('admin');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('carts.index')->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->name('carts.store')->middleware('auth');
Route::delete('carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::get('/admin', function() {
    return view('users.admin');
})->name('users.admin')->middleware('auth');

Route::get('/admin/products/create', [UserController::class, 'productCreate'])->name('users.products.create')->middleware('admin');
Route::get('/admin/products/edit', [UserController::class, 'productEdit'])->name('users.products.edit')->middleware('admin');


#Сделал - Кирилл. Роуты на регистрацию
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'create_login'])->name('login');
Route::post('/login', [AuthController::class, 'store_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


