<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;

class CartController extends Controller
{
    public function viewCart()
    {
        $cartItems = Cartitem::with('product')->where('user_id', auth()->id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->product->Price;
        });
        return view('cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        
        $cartItem = Cartitem::firstOrNew([
            'user_id' => auth()->id(),
            'ProductID' => $productId
        ]);

        if (!$cartItem->exists) {
            $cartItem->quantity = 1;
            $cartItem->save();
        } else {
            $cartItem->increment('quantity');
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cartitem::findOrFail($id);
        $action = $request->input('action');

        if ($action === 'increment') {
            $cartItem->increment('quantity');
        } elseif ($action === 'decrement' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
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
        $cartItems = Cartitem::with('product')->where('user_id', auth()->id())->get();
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
}
