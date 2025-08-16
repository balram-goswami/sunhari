<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'product_variation_ids',
        'variation_raw',
        'sku',
        'stock',
        'main_price',
        'sale_price',
        'sale_start_date',
        'sale_end_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function isOnSale(): bool
    {
        $today = now();
        return $this->sale_price 
            && $this->sale_start_date <= $today 
            && $this->sale_end_date >= $today;
    }
}
