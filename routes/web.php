<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController, CartController, CheckoutController};
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/portf', function () {
    return view('portfolio');
})->name('portfolio');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

   Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('coupons', CouponController::class);

});

// ─── Store (Public) ───────────────────────────────────────
Route::get('/store',          [StoreController::class, 'index'])->name('store.index');
Route::get('/store/{id}',     [StoreController::class, 'show'])->name('store.show');

// ─── Cart (Auth) ──────────────────────────────────────────
Route::middleware('auth')->prefix('cart')->name('cart.')->group(function () {
    Route::get('/',            [CartController::class, 'index'])->name('index');
    Route::post('/add',        [CartController::class, 'add'])->name('add');
    Route::patch('/{id}',      [CartController::class, 'update'])->name('update');
    Route::delete('/{id}',     [CartController::class, 'remove'])->name('remove');
});

// ─── Checkout (Auth) ──────────────────────────────────────
Route::middleware('auth')->prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/',            [CheckoutController::class, 'index'])->name('index');
    Route::post('/place',      [CheckoutController::class, 'place'])->name('place');
});

