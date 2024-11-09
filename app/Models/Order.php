<?php

namespace App\Models;


use App\HasOrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasOrderStatus;

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'payment_method',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'snap_token',
        'resi_code',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function calculateTotal()
    {
        $this->total_amount = $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $this->save();
    }

    public function markAsPaid()
    {
        $this->updateStatus('paid');
    }

    public function markAsProcessing()
    {
        $this->updateStatus('processing');
    }

    public function markAsShipped()
    {
        $this->updateStatus('shipped');
    }

    public function markAsDelivered()
    {
        $this->updateStatus('delivered');
    }

    public function cancel()
    {
        $this->updateStatus('cancelled');
    }
}
