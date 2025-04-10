<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // Fetch product details from the database (mocked for now)
        $product = [
            'id' => $id,
            'name' => 'Wheel Rim - Sport Series',
            'brand' => 'Enkei',
            'price' => 2299.99,
            'description' => 'High-performance, lightweight, and durable wheels, manufactured by the Japanese company Enkei Corporation.',
            'stock' => 15,
            'image' => 'storage/images/rim.avif',
        ];

        // Pass product data to the view
        return view('products.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Handle the form submission logic (e.g., update quantity or add to cart)
        $quantity = $request->input('quantity', 1);

        // Example: Add the product to the cart (you can replace this with your actual logic)
        session()->put("cart.$id", [
            'quantity' => $quantity,
            'product_id' => $id,
        ]);

        return redirect()->route('product.show', ['id' => $id])->with('success', 'Product updated successfully!');
    }
}
