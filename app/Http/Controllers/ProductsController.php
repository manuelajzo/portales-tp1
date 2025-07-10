<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::where('is_available', true)->get();

        return view('products', compact('products'));
    }
}
