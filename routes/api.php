<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('v1')->group(base_path('app/src/user/routes/v1/api.php'));
Route::prefix('v1')->group(base_path('app/src/visit/routes/v1/api.php'));
