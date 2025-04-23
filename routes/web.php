<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Set welcome page as the default landing page
Route::get('/', function () {
    $products = \App\Models\Product::latest()->take(8)->get();
    return view('welcome', compact('products'));
});

// Route for the login page
Route::view('/login', 'auth.login')->name('login');

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Process registration form submission
Route::post('/register', [RegisterController::class, 'register']);

// Cart routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'viewCart'])->name('cart');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
    Route::patch('/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
    Route::get('/modal', [CartController::class, 'getContent'])->name('cart.modal');
});

// Route for checkout page
Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');

// Route to handle product form submission
Route::post('/product/{ProductID}/update', [ProductController::class, 'update'])->name('products.update');

// Route for engine page
Route::get('/engine', [ProductController::class, 'showEngine'])->name('products');

// Route for product listing page
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Route for individual product with proper model binding
Route::get('/product/{ProductID}', [ProductController::class, 'show'])->name('products.show');

// Route for category filtering
Route::get('/products/category/{category}', [ProductController::class, 'filterByCategory'])->name('products.category');

// Product routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/category/{category}', [ProductController::class, 'filterByCategory'])->name('products.category');
    Route::get('/{ProductID}', [ProductController::class, 'show'])->name('products.show');
});







