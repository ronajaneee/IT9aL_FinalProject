<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Start with a basic query
            $products = Product::query();
            
            // Apply category filter if provided
            if ($request->category) {
                $products->where('Category', $request->category);
            }

            // Get the products with pagination (change from get() to paginate())
            $products = $products->paginate(12); // Show 12 products per page

            return view('products.product', compact('products'));
        } catch (\Exception $e) {
            \Log::error('Error fetching products: ' . $e->getMessage());
            return view('products.product', ['products' => collect([])]);
        }
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
