<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tax_id',
        'sub_total_price',
        'tax',
        'tax_price',
        'discount',
        'discount_price',
        'total_price',
        'status',
        'payment_method',
        'payment_status',
        'tracking_number',
        'order_number',
        'shipped_at',
        'delivered_at',
        'canceled_at'
    ];

    // Define relationships, for example, for order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
