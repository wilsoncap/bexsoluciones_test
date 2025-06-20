<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/loginbex', function () {
    return Inertia::render('LoginBex');
})->name('loginbex');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/visits-data', function () {
Route::middleware('auth:sanctum')->get('/visits-data', function () {
    return Inertia::render('Visits'); // o el nombre del componente Vue
});

Route::middleware('auth:sanctum')->get('/mapa', function () {
    return Inertia::render('Geolocalizacion'); // tu vista del mapa
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
