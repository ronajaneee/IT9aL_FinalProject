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
        $cartItems = Cart::content()->map(function($item) {
            $product = Product::find($item->id);
            $item->product = $product;
            return $item;
        });

        return view('cartview', [
            'cartItems' => $cartItems,
            'total' => Cart::total()
        ]);
    }

    public function getCartModal()
    {
        return view('cart', [
            'cartItems' => Cart::content(),
            'total' => Cart::total()
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,ProductID'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        Cart::add(
            $product->ProductID,
            $product->ProductName,
            1,
            $product->Price,
            ['image' => $product->Image]
        );

        return redirect()->back()->with('success', 'Product added to cart');
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
        $request->validate([
            'product_id' => 'required|exists:products,ProductID'
        ]);

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
