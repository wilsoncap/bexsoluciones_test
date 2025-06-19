<?php

use Illuminate\Support\Facades\Route;
use App\src\visit\http\controllers\VisitController;


Route::middleware('auth:sanctum')->prefix('visits')->group(function () {
    Route::get('/', [VisitController::class, 'index']);
    Route::post('/', [VisitController::class, 'store']);
    Route::get('{id}', [VisitController::class, 'show']);
    Route::patch('{id}', [VisitController::class, 'update']);
    Route::delete('{id}', [VisitController::class, 'destroy']);
});