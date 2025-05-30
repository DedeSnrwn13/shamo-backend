<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'all');
});

Route::prefix('categories')->controller(ProductCategoryController::class)->group(function () {
    Route::get('/', 'all');
});