<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'main_price',
        'sale_price',
        'sale_start_date',
        'sale_end_date',
        'type',
        'sku',
        'stock',
        'meta_title',
        'meta_keyword',
        'meta_description', 
        'is_featured', 
        'is_saleable'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = generateUniqueSlug($product->name);
        });
    }

    public function category()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(OrderItems::class, 'product_id', 'id');
    }

    public function galleries() 
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function similarProducts()
    {
        return $this->belongsToMany(Product::class, 'product_similar', 'product_id', 'similar_product_id');
    }
}
