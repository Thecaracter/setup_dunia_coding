<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    private function generateOrderCode($date)
    {
        $prefix = 'ORD';
        $dateCode = $date->format('ymd');
        $randomStr = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $sequence = sprintf('%04d', Order::whereDate('created_at', $date->format('Y-m-d'))->count() + 1);

        return $prefix . $dateCode . $randomStr . $sequence;
    }

    public function run(): void
    {
        // Truncate existing orders and order items
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Order::truncate();
        OrderItem::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $statuses = ['pending', 'paid', 'processing', 'shipped', 'delivered'];
        $paymentMethods = ['credit_card', 'bank_transfer', 'e-wallet'];

        // Get all users and products once
        $users = User::all();
        $products = Product::all();

        // Generate dates
        $startDate = Carbon::now()->subMonths(3);
        $endDate = Carbon::now();

        DB::beginTransaction();

        try {
            foreach ($users as $user) {
                $orderCount = rand(2, 3);

                for ($i = 0; $i < $orderCount; $i++) {
                    $orderDate = Carbon::createFromTimestamp(
                        rand($startDate->timestamp, $endDate->timestamp)
                    );

                    $status = $statuses[array_rand($statuses)];

                    // Create order with unique order code
                    $order = new Order([
                        'order_code' => $this->generateOrderCode($orderDate),
                        'user_id' => $user->id,
                        'total_amount' => '0.00',
                        'status' => $status,
                        'shipping_address' => $user->address,
                        'midtrans_transaction_id' => 'TRX-' . rand(100000, 999999),
                        'midtrans_payment_type' => $paymentMethods[array_rand($paymentMethods)],
                        'snap_token' => 'SNAP-' . rand(100000, 999999),
                    ]);

                    $order->created_at = $orderDate;
                    $order->updated_at = $orderDate;
                    $order->save();

                    // Add resi for shipped/delivered orders
                    if (in_array($status, ['shipped', 'delivered'])) {
                        $order->resi_code = 'JNE' . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10));
                        $order->save();
                    }

                    // Create order items
                    $totalAmount = '0.00';
                    $itemCount = rand(1, 3);

                    for ($j = 0; $j < $itemCount; $j++) {
                        $product = $products->random();
                        $quantity = min(rand(1, 3), $product->stock);

                        if ($quantity > 0) {
                            $orderItem = new OrderItem([
                                'order_id' => $order->id,
                                'product_id' => $product->id,
                                'quantity' => $quantity,
                                'price' => $product->price,
                            ]);

                            $orderItem->created_at = $orderDate;
                            $orderItem->updated_at = $orderDate;
                            $orderItem->save();

                            // Update product stock
                            if ($status !== 'cancelled') {
                                $product->decrement('stock', $quantity);
                            }

                            $totalAmount = bcadd($totalAmount, bcmul($product->price, (string) $quantity, 2), 2);
                        }
                    }

                    // Update order total
                    $order->total_amount = $totalAmount;
                    $order->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}