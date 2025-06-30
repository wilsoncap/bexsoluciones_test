<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, '__invoke']);
    // Add other product-related routes here
});