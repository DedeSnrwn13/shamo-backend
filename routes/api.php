<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'all');
});

Route::prefix('categories')->controller(ProductCategoryController::class)->group(function () {
    Route::get('/', 'all');
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::controller(TransactionController::class)->group(function () {
        Route::get('transactions', 'all');
        Route::post('checkout', 'checkout');
    });
});