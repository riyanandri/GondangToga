<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('name', 'ASC')->get();
        dd($products);
        return view('product.index', compact('products'));
    }
}
