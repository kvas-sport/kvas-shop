<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/catalog', [ProductController::class, 'index']);

Route::get('/orders', [OrderController::class, 'index']);
