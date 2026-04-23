<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController, CartController, CheckoutController};

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

// ─── Admin Products ───────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', Admin\ProductController::class);
});