<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/catalog', [CategoryController::class, 'index'])->name('products.index');
Route::get('/catalog/products', [ProductController::class, 'category'])->name('products.list');
Route::get('/catalog/{category}/product/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/catalog/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/catalog/load-more', [ProductController::class, 'loadMore'])->name('products.loadMore');


Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
Route::get('/products/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('admin');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('admin');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('admin');



Route::post('/images/{product}', [ImageController::class, 'store'])->name('images.store')->middleware('admin');
Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy')->middleware('admin');

Route::post('/characteristic/{product}', [CharacteristicController::class, 'store'])->name('characteristics.store')->middleware('admin');
Route::patch('/characteristic/{product}', [CharacteristicController::class, 'update'])->name('characteristics.update')->middleware('admin');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store')->middleware('auth');




Route::get('/cart', [CartController::class, 'index'])->name('carts.index')->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->name('carts.store')->middleware('auth');
Route::delete('carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy')->middleware('auth');


Route::get('/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::patch('/profile/{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/profile/notifications', [NotificationController::class, 'index'])->name('notifications.index');

Route::get('/admin', function() {
    return view('users.admin');
})->name('users.admin')->middleware('auth');
Route::get('/admin/products/create', [ProductController::class, 'productCreate'])->name('users.products.create')->middleware('admin');
Route::get('/admin/products/editList', [ProductController::class, 'productEditList'])->name('users.products.editList')->middleware('admin');
Route::get('/admin/products/edit', [ProductController::class, 'productEdit'])->name('users.products.edit')->middleware('admin');

//Route::get('/admin/products/create', [UserController::class, 'productCreate'])->name('users.products.create')->middleware('admin');
//Route::get('/admin/products/edit', [UserController::class, 'productEdit'])->name('users.products.edit')->middleware('admin');


#Сделал - Кирилл. Роуты на регистрацию
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'create_login'])->name('login');
Route::post('/login', [AuthController::class, 'store_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


