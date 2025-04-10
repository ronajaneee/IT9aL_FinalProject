<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function view()
    {
        // Return the checkout view
        return view('checkout');
    }
}
