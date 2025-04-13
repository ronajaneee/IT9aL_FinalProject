<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Route for main page (welcome.blade.php)
Route::view('/', 'welcome')->name('welcome');

// Route for the login page
Route::view('/login', 'auth.login')->name('login');

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Process registration form submission
Route::post('/register', [RegisterController::class, 'register']);

// Route for Cart page
Route::get('/cart', function () {return view('cart');})->name('cart.view');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Route for the cart modal content
Route::get('/cart/modal', function () {return view('cart');})->name('cart.modal');

// Route for dynamically loading cart content
Route::get('/cart/content', [CartController::class, 'getContent'])->name('cart.content');

// Route for checkout page
Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');

Route::get('/cart/view', function () {return view('cartview');})->name('cart.view');

Route::get('/cart', function () {return view('cart');})->name('cart');

Route::get('/cartview', [CartController::class, 'view'])->name('cartview');
Route::get('/cartview', [CartController::class, 'view'])->name('cart.view');

// Route for product details page
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route to handle product form submission
Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');

Route::get('/show', [ProductController::class, 'show'])->name('show');

Route::get('/engine', [ProductController::class, 'showEngine'])->name('product');

