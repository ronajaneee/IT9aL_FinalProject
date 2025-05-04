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

    public function search(Request $request)
    {
        $query = $request->input('search');
        
        $products = Product::where('ProductName', 'like', "%{$query}%")
            ->orWhere('Description', 'like', "%{$query}%") // Changed from ProductDescription to Description
            ->orWhere('SKU', 'like', "%{$query}%")  // Changed from ProductNumber to SKU
            ->orWhere('Category', 'like', "%{$query}%") // Added Category search
            ->paginate(12);

        return view('products.product', compact('products'));
    }
}
