<?php

namespace App\Models;

use App\HasOrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, HasOrderStatus;

    protected $fillable = [
        'order_code',
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'snap_token',
        'resi_code',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    /**
     * Generate order code
     * Using database transaction and timestamp to ensure unique code
     */
    public static function generateOrderCode(): string
    {
        return DB::transaction(function () {
            $prefix = 'ORDE';
            $timestamp = now()->format('ymdHis'); // Format: YYMMDDHHMMSS

            $lastOrder = DB::table('orders')
                ->where('order_code', 'like', $prefix . $timestamp . '%')
                ->orderBy('id', 'desc')
                ->lockForUpdate()
                ->first();

            $sequence = $lastOrder ? (intval(substr($lastOrder->order_code, -3)) + 1) : 1;
            return $prefix . $timestamp . str_pad($sequence, 3, '0', STR_PAD_LEFT);
        });
    }

    /**
     * Boot function dari model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_code)) {
                $order->order_code = self::generateOrderCode();
            }
        });
    }

    /**
     * Get possible next statuses
     */
    public function getNextPossibleStatuses(): array
    {
        if ($this->status === 'cancelled') {
            return [];
        }

        if ($this->status === 'delivered') {
            return ['cancelled'];
        }

        $statusFlow = [
            'pending' => ['paid', 'cancelled'],
            'paid' => ['processing', 'cancelled'],
            'processing' => ['shipped', 'cancelled'],
            'shipped' => ['delivered', 'cancelled'],
        ];

        return $statusFlow[$this->status] ?? [];
    }

    /**
     * Check if order has items with stock
     */
    public function hasStock(): bool
    {
        return $this->items->every(function ($item) {
            return $item->product->hasStock($item->quantity);
        });
    }

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
        $total = $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $this->total_amount = number_format($total, 2, '.', '');
        $this->save();

        return $this;
    }
}