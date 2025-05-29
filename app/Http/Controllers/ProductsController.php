<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('products', compact('products'));
    }
}
