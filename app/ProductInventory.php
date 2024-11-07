<?php

namespace App;

use Exception;

trait ProductInventory
{
    /**
     * Mengurangi stok produk
     * 
     * @param int $quantity
     * @throws Exception
     */
    public function decreaseStock(int $quantity): void
    {
        if (!$this->is_active) {
            throw new Exception("Product {$this->name} is not active.");
        }

        if ($this->stock < $quantity) {
            throw new Exception(
                "Insufficient stock for product {$this->name}. Available: {$this->stock}, Requested: {$quantity}"
            );
        }

        $this->decrement('stock', $quantity);
    }

    /**
     * Menambah stok produk
     * 
     * @param int $quantity
     */
    public function increaseStock(int $quantity): void
    {
        $this->increment('stock', $quantity);
    }

    /**
     * Cek apakah produk masih ada stok
     * 
     * @return bool
     */
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    /**
     * Cek apakah produk tersedia (aktif dan ada stok)
     * 
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->is_active && $this->isInStock();
    }

    /**
     * Update stok produk
     * 
     * @param int $newStock
     */
    public function updateStock(int $newStock): void
    {
        $this->update(['stock' => $newStock]);
    }

    /**
     * Cek apakah stok mencukupi
     * 
     * @param int $quantity
     * @return bool
     */
    public function hasEnoughStock(int $quantity): bool
    {
        return $this->stock >= $quantity;
    }
}