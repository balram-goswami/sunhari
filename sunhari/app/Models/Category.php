<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(ProductCategory::class);
    }
    public function parent() {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
    public function childs() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
