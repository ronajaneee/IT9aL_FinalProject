<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

class Cart extends Facade
{
    public static function count()
    {
        if (!Auth::check()) {
            return 0;
        }
        
        return Cartitem::where('user_id', Auth::id())->sum('Quantity');
    }

    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
