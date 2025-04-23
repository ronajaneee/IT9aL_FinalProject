<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartitem extends Model
{
    use HasFactory;

    protected $table = 'cartitem';
    protected $primaryKey = 'CartitemID';
    public $timestamps = true;

    protected $fillable = [
        'CartID',
        'ProductID',
        'user_id',
        'Quantity',
        'UnitPrice'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
