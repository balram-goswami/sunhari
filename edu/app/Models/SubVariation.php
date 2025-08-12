<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'variation_id'
    ];
    public function parent() {
        return $this->hasOne(Variation::class, 'id', 'variation_id');
    }
}
