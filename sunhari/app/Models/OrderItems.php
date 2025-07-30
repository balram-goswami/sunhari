<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_variation_id',
        'product_name',
        'product_image',
        'variation_name',
        'quantity',
        'price',
        'total'
    ];

    // Define relationship to Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define relationship to Product Variation
    public function productVariation()
    {
        return $this->belongsTo(Variation::class);
    }

    // Define relationship to Product Variation
    public function productSubVariation()
    {
        return $this->belongsTo(SubVariation::class);
    }
}
