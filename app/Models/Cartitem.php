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

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}
