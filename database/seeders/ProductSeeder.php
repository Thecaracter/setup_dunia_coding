<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    private function getBase64Images(): array
    {
        // Mengembalikan array base64 images
        return [
            'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCABkAGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//Z',
            'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCABkAGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//Z',
            'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCABkAGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//Z'
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smartphones = [
            [
                'name' => 'iPhone 15 Pro Max',
                'price' => '21999000.00',
                'stock' => 50,
                'description' => 'Latest iPhone with advanced features',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'price' => '19999000.00',
                'stock' => 45,
                'description' => 'Premium Android smartphone',
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'price' => '15999000.00',
                'stock' => 30,
                'description' => 'Pure Android Experience',
            ],
        ];

        $laptops = [
            [
                'name' => 'MacBook Pro 16"',
                'price' => '24999000.00',
                'stock' => 30,
                'description' => 'Powerful laptop for professionals',
            ],
            [
                'name' => 'ROG Gaming Laptop',
                'price' => '18999000.00',
                'stock' => 25,
                'description' => 'High-performance gaming laptop',
            ],
            [
                'name' => 'Lenovo Legion',
                'price' => '16999000.00',
                'stock' => 35,
                'description' => 'Best value gaming laptop',
            ],
        ];

        $accessories = [
            [
                'name' => 'AirPods Pro',
                'price' => '3999000.00',
                'stock' => 100,
                'description' => 'Wireless earbuds with noise cancellation',
            ],
            [
                'name' => 'Magic Keyboard',
                'price' => '1999000.00',
                'stock' => 75,
                'description' => 'Wireless keyboard for Apple devices',
            ],
            [
                'name' => 'Samsung Galaxy Watch 6',
                'price' => '4999000.00',
                'stock' => 60,
                'description' => 'Premium smartwatch with health features',
            ],
        ];

        $audio = [
            [
                'name' => 'Sony WH-1000XM4',
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
        ];

        $gaming = [
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
        ];

        // Define categories and their products
        $categories = [
            'Smartphones' => $smartphones,
            'Laptops' => $laptops,
            'Accessories' => $accessories,
            'Audio' => $audio,
            'Gaming' => $gaming
        ];

        // Get base64 images
        $images = $this->getBase64Images();

        // Create products for each category
        foreach ($categories as $categoryName => $products) {
            $category = Category::where('name', $categoryName)->first();

            foreach ($products as $product) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'description' => $product['description'],
                    'is_active' => true,
                    'image' => $images // Menyimpan array images langsung ke kolom image
                ]);
            }
        }
    }
}