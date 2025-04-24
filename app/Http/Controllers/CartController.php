<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart()
    {
        $cartItems = Cartitem::with('product')->where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->Quantity * $item->product->Price;
        });
        return view('cartview', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        
        $cartItem = Cartitem::firstOrNew([
            'user_id' => Auth::id(),
            'ProductID' => $productId
        ]);

        if (!$cartItem->exists) {
            $cartItem->Quantity = 1;
            $cartItem->save();
        } else {
            $cartItem->increment('Quantity');
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cartitem::findOrFail($id);
        $action = $request->input('action');

        if ($action === 'increment') {
            $cartItem->increment('Quantity');
        } elseif ($action === 'decrement' && $cartItem->Quantity > 1) {
            $cartItem->decrement('Quantity');
        }

        return redirect()->back();
    }

    public function removeCartItem($id)
    {
        $cartItem = Cartitem::findOrFail($id);
        $cartItem->delete();
        return redirect()->back();
    }

    public function getContent()
    {
        $cartItems = Cartitem::with('product')->where('user_id', Auth::id())->get();
        return view('cart.content', compact('cartItems'));
    }
}
