<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FavoriteProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VNpayController;
use App\Http\Controllers\lienheController;
use App\Http\Controllers\CustomerFeedbackController;
use App\Http\Controllers\GioithieuControlle;

Route::get('home', [HomeController::class, 'index'])->name('home.index');

Route::post('/vnpay', [VNpayController::class, 'vnpay']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/nike', [ProductController::class, 'nike'])->name('products.nike');
Route::get('/products/adidas', [ProductController::class, 'adidas'])->name('products.adidas');
Route::get('/products/puma', [ProductController::class, 'puma'])->name('products.puma');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('admin');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('admin');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('admin');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('admin');
Route::get('/products/qlsanpham', [ProductController::class, 'qlsanpham'])->name('products.qlsanpham')->middleware('admin');
Route::get('/products/{product_id}', [ProductController::class, 'show'])->name('products.show');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');  
Route::get('register1', [RegisterController::class, 'showRegistrationForm1'])->name('register1'); 
Route::post('/register', [RegisterController::class, 'register']);  
Route::post('/register1', [RegisterController::class, 'register1']);  

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');  
Route::post('/login', [LoginController::class, 'login']);  
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');  
Route::delete('/users/{user_id}', 'UserController@destroy')->name('users.destroy');


Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile');
Route::post('/update-profile', [LoginController::class, 'updateProfile'])->name('updateProfile');



Route::get('/cart', [FavoriteProductController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [FavoriteProductController::class, 'store'])->name('cart.store');
Route::delete('/cart/{favorite_id}', [FavoriteProductController::class, 'destroy'])->name('cart.destroy');



Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/qldonhang', [OrderController::class, 'qldonhang'])->name('orders.qldonhang');
Route::delete('/orders/{order_id}', [OrderController::class, 'deleteOrder'])->name('orders.delete');
Route::delete('/orders/{order_id}', [OrderController::class, 'deleteOrder1'])->name('orders.delete1');
Route::get('/orders/{order_id}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/lienhe', [lienheController::class, 'index'])->name('lienhe.lienhe');
Route::post('/feedbacks', [CustomerFeedbackController::class, 'store'])->name('feedbacks.store');

Route::get('/gioithieu', [GioithieuControlle::class, 'index'])->name('gioithieu.index');

Route::get('/qltaikhoan', [LoginController::class, 'qltaikhoan'])->name('qltaikhoan')->middleware('admin');