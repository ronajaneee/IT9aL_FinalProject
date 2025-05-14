<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'UserID',
        'total',
        'status'
    ];

    // If your primary key is different from 'id'
    protected $primaryKey = 'id';

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
