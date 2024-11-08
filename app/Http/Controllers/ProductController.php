<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'The latest iPhone featuring the powerful A17 Pro chip, 48MP camera system, and titanium design.',
                'price' => 21999000,
                'stock' => 50,
                'category' => 'Smartphones',
                'category_id' => 'smartphones',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 2,
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Experience the next level of mobile innovation with the Galaxy S24 Ultra featuring AI capabilities.',
                'price' => 19999000,
                'stock' => 35,
                'category' => 'Smartphones',
                'category_id' => 'smartphones',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 3,
                'name' => 'MacBook Pro 16"',
                'description' => 'Supercharged by M3 Pro or M3 Max. With a stunning Liquid Retina XDR display and up to 36 hours of battery life.',
                'price' => 24999000,
                'stock' => 20,
                'category' => 'Laptops',
                'category_id' => 'laptops',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 4,
                'name' => 'Dell XPS 15',
                'description' => 'Premium laptop featuring 13th Gen Intel® Core™ processors and NVIDIA® GeForce RTX™ graphics.',
                'price' => 18999000,
                'stock' => 15,
                'category' => 'Laptops',
                'category_id' => 'laptops',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 5,
                'name' => 'AirPods Pro (2nd Gen)',
                'description' => 'Featuring Active Noise Cancellation, Adaptive Audio, and up to 6 hours of listening time.',
                'price' => 3999000,
                'stock' => 100,
                'category' => 'Accessories',
                'category_id' => 'accessories',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 6,
                'name' => 'Samsung Galaxy Watch 6',
                'description' => 'Advanced health monitoring and fitness tracking in a sleek, customizable design.',
                'price' => 4999000,
                'stock' => 45,
                'category' => 'Accessories',
                'category_id' => 'accessories',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 7,
                'name' => 'iPad Pro 12.9"',
                'description' => 'Powered by the M2 chip, featuring Liquid Retina XDR display and ProMotion technology.',
                'price' => 15999000,
                'stock' => 0, // Out of stock example
                'category' => 'Laptops',
                'category_id' => 'laptops',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ],
            [
                'id' => 8,
                'name' => 'Sony WH-1000XM5',
                'description' => 'Industry-leading noise canceling headphones with exceptional sound quality.',
                'price' => 5999000,
                'stock' => 30,
                'category' => 'Accessories',
                'category_id' => 'accessories',
                'image' => 'https://via.placeholder.com/300x200',
                'is_active' => true
            ]
        ];

        // Categories untuk dropdown
        $categories = [
            ['id' => 'smartphones', 'name' => 'Smartphones'],
            ['id' => 'laptops', 'name' => 'Laptops'],
            ['id' => 'accessories', 'name' => 'Accessories']
        ];

        return view('admin.product', compact('products', 'categories'));
    }
}
