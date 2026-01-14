<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ======================
// GUEST
// ======================
Route::get('/', function () {
    $products = Product::latest()->take(8)->get();
    return view('user.home', compact('products'));
})->name('home');

// ======================
// AUTHENTICATED USER
// ======================
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (Admin only)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('admin')->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Products (CRUD)
    Route::resource('products', ProductController::class);

    // Categories (CRUD)
    Route::resource('category', CategoryController::class);

    // ======================
    // KERANJANG PESANAN
    // ======================
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    // ======================
    // CHECKOUT
    // ======================
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

// ======================
// AUTH ROUTES
// ======================
require __DIR__ . '/auth.php';
