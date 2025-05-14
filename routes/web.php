<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;

// Set welcome page as the default landing page
Route::get('/', function () {
    $products = \App\Models\Product::latest()->take(8)->get();
    return view('welcome', compact('products'));
})->name('welcome');

// Route for the login page
Route::view('/login', 'auth.login')->name('login');

// Auth routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cart routes
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/modal', [CartController::class, 'getCartModal'])->name('cart.modal');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/account/settings', function () {
        $orders = Auth::user()->orders()->latest()->get();
        return view('account.settings', compact('orders'));
    })->name('account.settings');
});

// Product routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/category/{category}', [ProductController::class, 'byCategory'])->name('products.category');
    Route::get('/{ProductID}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/{ProductID}/update', [ProductController::class, 'update'])->name('products.update');
});

// Other routes
Route::get('/shop', [ProductController::class, 'showEngine'])->name('products');  // Update this route name and path
Route::get('/featured-products', [ProductController::class, 'getFeaturedProducts'])->name('products.featured');
Route::get('/cartview', function () { return view('cartview'); })->name('cartview.page');
Route::get('/order/success/{order}', [CheckoutController::class, 'success'])->name('order.success');
Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success/{order}', [CheckoutController::class, 'success'])->name('order.success');
Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');





