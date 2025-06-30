<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{

    public function __invoke(){
        
        $products = Product::with('category')->get();

        return Inertia::render('products', [
            'products' => $products
        ]);
    }

}
