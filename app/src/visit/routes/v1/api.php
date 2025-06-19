<?php

use Illuminate\Support\Facades\Route;
use App\src\visit\http\controllers\VisitController;


Route::middleware('auth:sanctum')->prefix('visits')->group(function () {
    Route::get('/', [VisitController::class, 'index']);
    Route::post('/', [VisitController::class, 'store']);
    Route::get('{visit}', [VisitController::class, 'show']);
    Route::patch('{visit}', [VisitController::class, 'update']);
    Route::delete('{visit}', [VisitController::class, 'destroy']);
});