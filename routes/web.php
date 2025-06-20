<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\src\visit\models\Visit;

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
    $visits = Visit::all();
    return Inertia::render('Visits', compact('visits'));
});

Route::middleware('auth:sanctum')->get('/mapa', function () {
    $visits = Visit::all();
    return Inertia::render('Geolocalizacion', ['visits' => $visits]);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
