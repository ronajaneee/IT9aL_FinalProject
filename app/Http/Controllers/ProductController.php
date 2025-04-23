<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        return view('products.product', compact('products'));
    }

    public function show($ProductID)
    {
        $product = Product::findOrFail($ProductID);
        return view('products.show', compact('product'));
    }

    public function byCategory($category)
    {
        $products = Product::where('Category', $category)->paginate(12);
        return view('products.product', compact('products'));
    }
}
