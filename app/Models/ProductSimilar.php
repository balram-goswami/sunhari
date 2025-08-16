<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSimilar extends Model
{
    use HasFactory;

    protected $table = 'product_similar';
    protected $fillable = ['product_id', 'similar_product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function similarProduct()
    {
        return $this->belongsTo(Product::class, 'similar_product_id');
    }
}
