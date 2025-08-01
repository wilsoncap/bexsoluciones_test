<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('v1')->group(base_path('app/src/user/routes/v1/api.php'));
Route::prefix('v1')->group(base_path('app/src/visit/routes/v1/api.php'));
Route::prefix('v1')->group(base_path('app/src/Product/routes/v1/api.php'));


// Route::group([],function () {
//     Route::get('/products', [ProductController::class, '__invoke']);
//     // Add other product-related routes here
// });