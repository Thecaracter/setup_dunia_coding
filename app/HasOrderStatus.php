<?php

namespace App;

use Exception;
use Illuminate\Support\Facades\DB;

trait HasOrderStatus
{
    /**
     * Status yang valid untuk order
     */
    public static array $validStatuses = [
        'pending',
        'paid',
        'processing',
        'shipped',
        'delivered',
        'cancelled'
    ];

    /**
     * Update status order
     * 
     * @param string $status
     * @throws Exception
     */
    public function updateStatus(string $status): void
    {
        if (!in_array($status, self::$validStatuses)) {
            throw new Exception("Invalid order status: {$status}");
        }

        // Validasi transisi status
        $this->validateStatusTransition($status);

        DB::transaction(function () use ($status) {
            $oldStatus = $this->status;
            $this->status = $status;
            $this->save();

            // Jika order dibatalkan, kembalikan stok
            if ($status === 'cancelled' && $oldStatus !== 'cancelled') {
                $this->restoreProductStock();
            }
        });
    }

    /**
     * Validasi transisi status
     * 
     * @param string $newStatus
     * @throws Exception
     */
    private function validateStatusTransition(string $newStatus): void
    {
        // Order yang sudah dibatalkan tidak bisa diubah statusnya
        if ($this->status === 'cancelled') {
            throw new Exception("Cannot change status of cancelled order");
        }

        // Order yang sudah selesai hanya bisa dibatalkan
        if ($this->status === 'delivered' && $newStatus !== 'cancelled') {
            throw new Exception("Delivered order can only be cancelled");
        }

        // Validasi urutan status
        $statusOrder = array_flip(['pending', 'paid', 'processing', 'shipped', 'delivered']);
        if (isset($statusOrder[$this->status], $statusOrder[$newStatus])) {
            if ($statusOrder[$newStatus] < $statusOrder[$this->status]) {
                throw new Exception("Invalid status transition from {$this->status} to {$newStatus}");
            }
        }
    }

    /**
     * Kembalikan stok produk saat order dibatalkan
     */
    private function restoreProductStock(): void
    {
        foreach ($this->items as $item) {
            $item->product->increaseStock($item->quantity);
        }
    }

    /**
     * Helper methods untuk update status
     */
    public function markAsPaid(): void
    {
        $this->updateStatus('paid');
    }

    public function markAsProcessing(): void
    {
        $this->updateStatus('processing');
    }

    public function markAsShipped(): void
    {
        $this->updateStatus('shipped');
    }

    public function markAsDelivered(): void
    {
        $this->updateStatus('delivered');
    }

    public function cancel(): void
    {
        $this->updateStatus('cancelled');
    }

    /**
     * Helper methods untuk cek status
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isPaid(): bool
    {
        return in_array($this->status, ['paid', 'processing', 'shipped', 'delivered']);
    }

    public function isProcessing(): bool
    {
        return $this->status === 'processing';
    }

    public function isShipped(): bool
    {
        return $this->status === 'shipped';
    }

    public function isDelivered(): bool
    {
        return $this->status === 'delivered';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }
}