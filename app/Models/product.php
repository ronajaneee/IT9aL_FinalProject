<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    public $timestamps = true;

    protected $fillable = [
        'SupplierID',
        'ProductName',
        'SKU',
        'Description',
        'Image',
        'Price',
        'Quantity',
        'Category',
        'sales'
    ];

    /**
     * Scope a query to filter by category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('Category', $category);
    }

    /**
     * Get the formatted price with currency symbol
     */
    public function getFormattedPrice()
    {
        return '₱' . number_format($this->Price, 2);
    }

    /**
     * Get the stock status
     */
    public function getStockStatus()
    {
        return $this->Quantity > 0 ? 'In Stock' : 'Out of Stock';
    }

    /**
     * Check if product is in stock
     */
    public function isInStock()
    {
        return $this->Quantity > 0;
    }

    /**
     * Get the product's image URL
     */
    public function getImageUrl()
    {
        return asset('storage/images/' . $this->Image);
    }
}

