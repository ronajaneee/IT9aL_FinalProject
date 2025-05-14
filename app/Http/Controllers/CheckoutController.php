<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;

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
        try {
            // Start database transaction
            \DB::beginTransaction();

            $order = Order::create([
                'UserID' => auth()->id(),
                'total' => Cart::total(),
                'status' => 'processing'
            ]);

            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,  // Now matches the column name
                    'quantity' => $item->qty,
                    'price' => $item->price
                ]);

                // Optionally update product stock here
                $product = Product::find($item->id);
                if ($product) {
                    $product->decrement('Quantity', $item->qty);
                }
            }

            // Commit transaction
            \DB::commit();
            
            // Clear the cart
            Cart::destroy();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'orderId' => $order->id,
                'redirect' => route('order.success', $order->id)
            ]);

        } catch (\Exception $e) {
            // Rollback transaction on error
            \DB::rollback();
            
            return response()->json([
                'success' => false,
                'message' => 'Error processing order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
