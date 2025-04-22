<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;

class CartController extends Controller
{
    public function viewCart()
    {
        // Retrieve or create dummy data for cart items and total.
        $cartItems = [/* ... */];
        $total = 0;
        // Calculate total here...
        return view('cartview', compact('cartItems', 'total'));
    }
    
    public function updateCart(Request $request, $id)
    {
        // Validate and update cart quantity based on the action (increment/decrement)
        // For example:
        $action = $request->input('action');
        // Update the cart item with $id accordingly.
        // Then redirect back:
        return redirect()->route('cart.view');
    }
    
    public function removeCartItem($id)
    {
        // Remove the cart item with $id.
        return redirect()->route('cart.view');
    }

    public function getContent()
    {
        $cartItems = Cartitem::where('user_id', auth()->id())->get();
        return view('cart.content', compact('cartItems'));
    }

    public function update(Request $request)
    {
        session_start();

        if ($request->has('increment')) {
            $_SESSION['cart_quantity'] = (int)$_SESSION['cart_quantity'] + 1;
        } elseif ($request->has('decrement')) {
            if ((int)$_SESSION['cart_quantity'] > 1) {
                $_SESSION['cart_quantity'] = (int)$_SESSION['cart_quantity'] - 1;
            }
        }

        return redirect()->back();
    }

    public function view()
    {
        $cartItems = Cartitem::where('user_id', auth()->id())->get();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cartItem = new Cartitem();
        $cartItem->product_id = $productId;
        $cartItem->quantity = 1; // You might want to allow users to specify quantity
        $cartItem->user_id = auth()->id(); // Assuming you have user authentication
        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
