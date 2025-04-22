<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($ProductID = null)
    {
        if (!$ProductID) {
            return redirect()->route('welcome')->with('error', 'Product ID is required.');
        }

        $product = Product::find($ProductID);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('products.show', compact('product'));
    }

    public function showEngine()
    {
        $products = Product::all();
        return view('products.product', compact('products'));
    }

    public function update(Request $request, $id)
    {
        // Handle the form submission logic (e.g., update quantity or add to cart)
        $quantity = $request->input('quantity', 1);

        // Example: Add the product to the cart (you can replace this with your actual logic)
        session()->put("cart.\$id", [
            'quantity' => $quantity,
            'product_id' => $id,
        ]);

        return redirect()->route('product.show', ['ProductID' => $id])->with('success', 'Product updated successfully!');
    }

    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
