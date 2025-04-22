<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Route for main page (welcome.blade.php)
Route::get('/', [ProductController::class, 'index'])->name('welcome');

// Route for the login page
Route::view('/login', 'auth.login')->name('login');

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Process registration form submission
Route::post('/register', [RegisterController::class, 'register']);

Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Route for the cart modal content
Route::get('/cart/modal', function () {return view('cart');})->name('cart.modal');

// Route for dynamically loading cart content
Route::get('/cart/content', [CartController::class, 'getContent'])->name('cart.content');

// Route for checkout page
Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');

// Route for product details page
Route::get('/product/{ProductID}', [ProductController::class, 'show'])
    ->where('ProductID', '[0-9]+') // Ensure 'id' is a numeric parameter
    ->name('product.show');

// Route to handle product form submission
Route::post('/product/{ProductID}/update', [ProductController::class, 'update'])->name('products.update');

Route::get('/engine', [ProductController::class, 'showEngine'])->name('products');

Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');

// Route for product listing page (assuming this is what "product" refers to)
Route::get('/product', [ProductController::class, 'index'])->name('product');
