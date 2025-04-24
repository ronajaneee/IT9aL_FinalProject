<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function view()
    {
        $cartItems = Cartitem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum(function($item) {
            return $item->getSubtotal();
        });

        $shipping = 150.00; // Fixed shipping rate
        $total = $subtotal + $shipping;

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
