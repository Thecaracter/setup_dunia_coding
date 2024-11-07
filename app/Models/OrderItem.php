<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubtotal()
    {
        return $this->price * $this->quantity;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderItem) {
            $orderItem->price = $orderItem->product->price;
            $orderItem->product->decreaseStock($orderItem->quantity);
        });
    }
}
