<?php

namespace App\src\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class GraficController extends Controller
{
    // TODO: Implement controller methods

    public function index(){
        return Inertia::render('Grafics');
    }
}
