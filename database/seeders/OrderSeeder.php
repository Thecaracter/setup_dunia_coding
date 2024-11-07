<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'paid', 'processing', 'shipped', 'delivered'];
        $paymentMethods = ['credit_card', 'bank_transfer', 'e-wallet'];

        // Ambil semua user
        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            // Buat 2-3 order untuk setiap user
            for ($i = 0; $i < rand(2, 3); $i++) {
                // Buat order baru dengan total_amount awal 0
                $order = Order::create([
                    'user_id' => $user->id,
                    'total_amount' => '0.00', // Set initial value
                    'status' => $statuses[array_rand($statuses)],
                    'shipping_address' => $user->address,
                    'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                    'midtrans_transaction_id' => 'TRX-' . rand(100000, 999999),
                    'midtrans_payment_type' => $paymentMethods[array_rand($paymentMethods)],
                    'snap_token' => 'SNAP-' . rand(100000, 999999),
                ]);

                // Tambah 1-3 items ke order
                $totalAmount = '0.00';
                $itemCount = rand(1, 3);

                for ($j = 0; $j < $itemCount; $j++) {
                    $product = $products->random();
                    $quantity = rand(1, 3);

                    $orderItem = OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $product->price,
                    ]);

                    // Hitung subtotal item ini
                    $subtotal = bcmul($product->price, (string) $quantity, 2);
                    // Tambahkan ke total
                    $totalAmount = bcadd($totalAmount, $subtotal, 2);
                }

                // Update total order
                $order->update([
                    'total_amount' => $totalAmount
                ]);
            }
        }
    }
}