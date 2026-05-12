<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - FitZone Gym Management System
|--------------------------------------------------------------------------
*/

// Halaman utama / landing page (bisa diakses semua orang, termasuk tamu)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard — hanya untuk user yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Produk:
// - index: semua yang login bisa lihat
// - create, store, edit, update, destroy: hanya admin
Route::middleware(['auth'])->group(function () {
    // Semua user (admin & user biasa) bisa melihat daftar produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Hanya admin yang bisa CRUD produk
    Route::middleware(['admin'])->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

// Route Profile — semua user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Breeze Authentication (login, register, logout, dll.)
require __DIR__.'/auth.php';
