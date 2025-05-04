<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Facades\Cart;

class CartController extends Controller
{
    public function viewCart()
    {
        $cartItems = Cartitem::with('product')
            ->where('user_id', Auth::id())
            ->active()
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->getSubtotal();
        });

        return view('cartview', compact('cartItems', 'total'));
    }

    public function getCartModal()
    {
        $cartItems = Cartitem::with('product')
            ->where('user_id', Auth::id())
            ->active()
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->getSubtotal();
        });

        return view('cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $request->validate([
            'product_id' => 'required|exists:products,ProductID'
        ]);

        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        
        $cartItem = Cartitem::firstOrNew([
            'user_id' => Auth::id(),
            'ProductID' => $productId
        ]);

        if (!$cartItem->exists) {
            $cartItem->Quantity = 1;
            $cartItem->UnitPrice = $product->Price;
            $cartItem->save();
        } else {
            // Check if we have enough stock before incrementing
            if ($cartItem->Quantity < $product->Quantity) {
                $cartItem->increment('Quantity');
            } else {
                return redirect()->back()->with('error', 'Not enough stock available');
            }
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
        return redirect()->route('cart.view');
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        Cart::add(
            $product->ProductID,
            $product->ProductName,
            1,
            $product->Price,
            ['image' => $product->Image]
        );
        
        return back()->with('success', 'Product added to cart');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Product removed from cart');
    }
}
