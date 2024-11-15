<?php

namespace Database\Seeders;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    private function downloadAndConvertToBase64($imageUrl)
    {
        try {
            $response = Http::timeout(30)->get($imageUrl);
            if ($response->successful()) {
                $imageData = $response->body();
                $base64 = base64_encode($imageData);
                return "data:image/jpeg;base64," . $base64;
            }
        } catch (Exception $e) {
            \Log::error("Error downloading image: " . $e->getMessage());
        }
        return null;
    }

    private function getBase64Images(): array
    {
        $imageUrls = [
            // Smartphones
            'https://dummyimage.com/600x600/000/fff.jpg&text=iPhone+15',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Samsung+S24',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Pixel+8',

            // Laptops
            'https://dummyimage.com/600x600/000/fff.jpg&text=MacBook',
            'https://dummyimage.com/600x600/000/fff.jpg&text=ROG',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Legion',

            // Computer Parts
            'https://dummyimage.com/600x600/000/fff.jpg&text=RTX4080',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Intel',
            'https://dummyimage.com/600x600/000/fff.jpg&text=SSD',

            // Audio
            'https://dummyimage.com/600x600/000/fff.jpg&text=Sony+WH1000XM5',
            'https://dummyimage.com/600x600/000/fff.jpg&text=JBL',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Bose',

            // Gaming
            'https://dummyimage.com/600x600/000/fff.jpg&text=PS5',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Switch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Xbox',

            // Cameras
            'https://dummyimage.com/600x600/000/fff.jpg&text=Sony+Camera',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Canon',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Fujifilm',

            // Smart Home
            'https://dummyimage.com/600x600/000/fff.jpg&text=Nest+Hub',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Echo',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Philips+Hue',

            // Wearables
            'https://dummyimage.com/600x600/000/fff.jpg&text=Apple+Watch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Galaxy+Watch',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Garmin',

            // Networking
            'https://dummyimage.com/600x600/000/fff.jpg&text=ASUS+Router',
            'https://dummyimage.com/600x600/000/fff.jpg&text=TP+Link',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Netgear',

            // Accessories
            'https://dummyimage.com/600x600/000/fff.jpg&text=Logitech',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Keychron',
            'https://dummyimage.com/600x600/000/fff.jpg&text=Samsung+SSD'
        ];

        $base64Images = [];
        foreach ($imageUrls as $url) {
            $base64 = $this->downloadAndConvertToBase64($url);
            if ($base64) {
                $base64Images[] = $base64;
            }
        }

        return $base64Images;
    }

    public function run(): void
    {
        // Product Data
        $allProducts = [
            'Smartphones' => [
                [
                    'name' => 'iPhone 15 Pro Max',
                    'price' => '21999000.00',
                    'stock' => 50,
                    'description' => 'Latest iPhone with advanced features and A17 Pro chip',
                ],
                [
                    'name' => 'Samsung Galaxy S24 Ultra',
                    'price' => '19999000.00',
                    'stock' => 45,
                    'description' => 'Premium Android smartphone with S-Pen',
                ],
                [
                    'name' => 'Google Pixel 8 Pro',
                    'price' => '15999000.00',
                    'stock' => 30,
                    'description' => 'Pure Android Experience with advanced AI features',
                ],
            ],
            'Laptops' => [
                [
                    'name' => 'MacBook Pro 16"',
                    'price' => '24999000.00',
                    'stock' => 30,
                    'description' => 'Powerful laptop with M3 chip',
                ],
                [
                    'name' => 'ROG Gaming Laptop',
                    'price' => '18999000.00',
                    'stock' => 25,
                    'description' => 'High-performance gaming laptop with RTX 4090',
                ],
                [
                    'name' => 'Lenovo Legion',
                    'price' => '16999000.00',
                    'stock' => 35,
                    'description' => 'Best value gaming laptop',
                ],
            ],
            'Computer Parts' => [
                [
                    'name' => 'RTX 4080 Ti',
                    'price' => '15999000.00',
                    'stock' => 20,
                    'description' => 'High-end graphics card for gaming',
                ],
                [
                    'name' => 'Intel i9-14900K',
                    'price' => '8999000.00',
                    'stock' => 25,
                    'description' => 'Latest Intel processor',
                ],
                [
                    'name' => 'Samsung 990 Pro 2TB',
                    'price' => '2999000.00',
                    'stock' => 40,
                    'description' => 'Fast NVMe SSD storage',
                ],
            ],
            'Audio Equipment' => [
                [
                    'name' => 'Sony WH-1000XM5',
                    'price' => '4999000.00',
                    'stock' => 40,
                    'description' => 'Premium noise cancelling headphones',
                ],
                [
                    'name' => 'JBL Flip 6',
                    'price' => '1999000.00',
                    'stock' => 55,
                    'description' => 'Portable waterproof speaker',
                ],
                [
                    'name' => 'Bose QC45',
                    'price' => '5999000.00',
                    'stock' => 35,
                    'description' => 'Premium comfort headphones',
                ],
            ],
            'Gaming Gear' => [
                [
                    'name' => 'PS5 Digital Edition',
                    'price' => '8999000.00',
                    'stock' => 25,
                    'description' => 'Next-gen gaming console',
                ],
                [
                    'name' => 'Nintendo Switch OLED',
                    'price' => '4999000.00',
                    'stock' => 40,
                    'description' => 'Portable gaming console with OLED screen',
                ],
                [
                    'name' => 'Xbox Series X',
                    'price' => '8499000.00',
                    'stock' => 30,
                    'description' => 'Most powerful gaming console',
                ],
            ],
            'Cameras' => [
                [
                    'name' => 'Sony A7 IV',
                    'price' => '29999000.00',
                    'stock' => 15,
                    'description' => 'Full-frame mirrorless camera',
                ],
                [
                    'name' => 'Canon EOS R6 Mark II',
                    'price' => '27999000.00',
                    'stock' => 20,
                    'description' => 'Professional mirrorless camera',
                ],
                [
                    'name' => 'Fujifilm X-T5',
                    'price' => '24999000.00',
                    'stock' => 25,
                    'description' => 'Premium APS-C camera',
                ],
            ],
            'Smart Home' => [
                [
                    'name' => 'Google Nest Hub',
                    'price' => '1499000.00',
                    'stock' => 40,
                    'description' => 'Smart display with Google Assistant',
                ],
                [
                    'name' => 'Amazon Echo Show',
                    'price' => '1299000.00',
                    'stock' => 35,
                    'description' => 'Smart display with Alexa',
                ],
                [
                    'name' => 'Philips Hue Starter Kit',
                    'price' => '999000.00',
                    'stock' => 45,
                    'description' => 'Smart lighting system',
                ],
            ],
            'Wearables' => [
                [
                    'name' => 'Apple Watch Series 9',
                    'price' => '6999000.00',
                    'stock' => 40,
                    'description' => 'Latest Apple smartwatch with health features',
                ],
                [
                    'name' => 'Samsung Galaxy Watch 6',
                    'price' => '4999000.00',
                    'stock' => 35,
                    'description' => 'Premium Android smartwatch',
                ],
                [
                    'name' => 'Garmin Fenix 7',
                    'price' => '9999000.00',
                    'stock' => 20,
                    'description' => 'Professional sports watch',
                ],
            ],
            'Networking' => [
                [
                    'name' => 'ASUS ROG Rapture',
                    'price' => '3999000.00',
                    'stock' => 25,
                    'description' => 'High-end WiFi 6 gaming router',
                ],
                [
                    'name' => 'TP-Link Deco X90',
                    'price' => '4999000.00',
                    'stock' => 30,
                    'description' => 'Mesh WiFi system for large homes',
                ],
                [
                    'name' => 'Netgear Nighthawk',
                    'price' => '3499000.00',
                    'stock' => 35,
                    'description' => 'Professional gaming router',
                ],
            ],
            'Accessories' => [
                [
                    'name' => 'Logitech MX Master 3S',
                    'price' => '1499000.00',
                    'stock' => 50,
                    'description' => 'Premium wireless mouse for productivity',
                ],
                [
                    'name' => 'Keychron Q1',
                    'price' => '2499000.00',
                    'stock' => 30,
                    'description' => 'Mechanical keyboard with custom switches',
                ],
                [
                    'name' => 'Samsung T7 Shield 2TB',
                    'price' => '1999000.00',
                    'stock' => 45,
                    'description' => 'Rugged portable SSD',
                ],
            ],
        ];

        // Get images
        $images = $this->getBase64Images();
        $imageIndex = 0;

        // Create products
        foreach ($allProducts as $categoryName => $products) {
            $category = Category::where('name', $categoryName)->first();

            if (!$category)
                continue;

            foreach ($products as $productData) {
                try {
                    Product::create([
                        'category_id' => $category->id,
                        'name' => $productData['name'],
                        'slug' => Str::slug($productData['name']),
                        'price' => $productData['price'],
                        'stock' => $productData['stock'],
                        'description' => $productData['description'],
                        'is_active' => true,
                        'image' => $images[$imageIndex] ?? $images[0]
                    ]);

                    $imageIndex++;
                    $this->command->info("Created product: {$productData['name']}");

                } catch (Exception $e) {
                    $this->command->error("Error creating product {$productData['name']}: " . $e->getMessage());
                }
            }
        }
    }
}
