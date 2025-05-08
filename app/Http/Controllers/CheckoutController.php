<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart;

class CheckoutController extends Controller
{
    public function view()
    {
        // Redirect to login if user is not authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login or register to complete your purchase');
        }

        $cartItems = Cart::content();
        $subtotal = Cart::subtotal();
        $shipping = 150.00;
        $total = Cart::total() + $shipping;

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function process(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20'
        ]);

        // Process the checkout logic here
        // For now, just redirect back with success message
        return redirect()->route('cart.view')->with('success', 'Order placed successfully!');
    }
}
