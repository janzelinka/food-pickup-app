<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $todayPickups = [];

        if (auth()->check()) {
            $todayPickups = auth()->user()->orders()
                ->whereDate('pickup_time', date('Y-m-d'))
                ->where('status', '!=', 'completed')
                ->get();
        }

        return view('home', compact('products', 'todayPickups'));
    }
}
