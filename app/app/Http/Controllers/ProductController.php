<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $productsByCategory = Product::orderBy('sort_order')->get()->groupBy('category');

        return view('products.index', compact('productsByCategory'));
    }
}
;