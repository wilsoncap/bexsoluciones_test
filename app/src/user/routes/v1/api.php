<?php

use Illuminate\Support\Facades\Route;
use App\src\user\controllers\AuthController;


// Route::post('/register', function () {
//     return response()->json(['message' => 'Sí llegó']);
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/visits-data', function () {
    return response()->json(['message' => 'Acceso autorizado']);
});