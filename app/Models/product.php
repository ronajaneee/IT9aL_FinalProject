<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    protected $appends = ['rating', 'review_count'];

    public function getRatingAttribute()
    {
        $rating = $this->reviews()->avg('rating') ?? 0;
        return round($rating, 1);
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews()->count();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'ProductID');
    }

    public function isAvailable()
    {
        return $this->Quantity > 0;
    }

    public function getFormattedPrice()
    {
        return '₱' . number_format($this->Price, 2);
    }

    public function getImageUrl()
    {
        if ($this->Image) {
            return asset('storage/images/' . $this->Image);
        }
        return asset('storage/images/default-product.jpg');
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('Category', $category);
    }

    public function scopeSort($query, $sort)
    {
        switch ($sort) {
            case 'price-low':
                return $query->orderBy('Price', 'asc');
            case 'price-high':
                return $query->orderBy('Price', 'desc');
            case 'newest':
                return $query->orderBy('created_at', 'desc');
            case 'best-selling':
                return $query->orderBy('sales', 'desc');
            default:
                return $query->orderBy('ProductID', 'desc');
        }
    }

    public function scopeFilterByPrice($query, $min, $max)
    {
        if ($min) {
            $query->where('Price', '>=', $min);
        }
        if ($max) {
            $query->where('Price', '<=', $max);
        }
        return $query;
    }
}
