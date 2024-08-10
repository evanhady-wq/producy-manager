<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware(['auth:api'])->group(function () {
    // Category Products routes
    Route::get('/category-products', [CategoryProductController::class, 'index']);
    Route::get('/category-products/{id}', [CategoryProductController::class, 'show']);
    Route::post('/category-products', [CategoryProductController::class, 'store']);
    Route::put('/category-products/{id}', [CategoryProductController::class, 'update']);
    Route::delete('/category-products/{id}', [CategoryProductController::class, 'destroy']);

    // Products routes
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
