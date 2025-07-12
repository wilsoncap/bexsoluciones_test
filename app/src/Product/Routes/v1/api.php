<?php

use App\Http\Controllers\ProductController;
use App\src\Product\Http\Controllers\GenerateProductReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, '__invoke']);
    // Add other product-related routes here
});


Route::middleware('auth:sanctum')->prefix('product-review')->group(function () {
    Route::post('/', [GenerateProductReviewController::class, '__invoke']);
    // Add other product-related routes here
});