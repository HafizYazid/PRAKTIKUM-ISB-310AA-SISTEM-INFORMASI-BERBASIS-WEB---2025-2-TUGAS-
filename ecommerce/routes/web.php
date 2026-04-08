<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::view('/register', 'register');

// Asset routes
Route::get('/css/login.css', function () {
    return response()->file(public_path('css/login.css'), ['Content-Type' => 'text/css']);
})->name('login.css');

Route::get('/js/login.js', function () {
    return response()->file(public_path('js/login.js'), ['Content-Type' => 'application/javascript']);
})->name('login.js');

Route::get('/css/dashboard.css', function () {
    return response()->file(public_path('css/dashboard.css'), ['Content-Type' => 'text/css']);
})->name('dashboard.css');

Route::get('/js/dashboard.js', function () {
    return response()->file(public_path('js/dashboard.js'), ['Content-Type' => 'application/javascript']);
})->name('dashboard.js');

Route::get('/css/admin.css', function () {
    return response()->file(public_path('css/admin.css'), ['Content-Type' => 'text/css']);
})->name('admin.css');

Route::get('/js/admin.js', function () {
    return response()->file(public_path('js/admin.js'), ['Content-Type' => 'application/javascript']);
})->name('admin.js');

Route::get('/css/app.css', function () {
    return response()->file(public_path('css/app.css'), ['Content-Type' => 'text/css']);
})->name('app.css');

Route::get('/js/app.js', function () {
    return response()->file(public_path('js/app.js'), ['Content-Type' => 'application/javascript']);
})->name('app.js');

Route::get('/assets/{type}/{file}', function ($type, $file) {
    $path = public_path("{$type}/{$file}.{$type}");
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => $type === 'css' ? 'text/css' : 'application/javascript']);
    }
    abort(404);
})->name('assets');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cart routes
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{id}', [CartController::class, 'add'])->name('add');
        Route::put('/update/{id}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });

    // Admin routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class);
    });
});