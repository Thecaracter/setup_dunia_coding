<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Smartphones',
                'description' => 'Latest smartphones from various brands including iPhone, Samsung, and more',
            ],
            [
                'name' => 'Laptops',
                'description' => 'Professional and gaming laptops from top manufacturers',
            ],
            [
                'name' => 'Computer Parts',
                'description' => 'PC components including CPU, GPU, RAM, and storage devices',
            ],
            [
                'name' => 'Audio Equipment',
                'description' => 'High-quality headphones, earbuds, speakers, and audio accessories',
            ],
            [
                'name' => 'Gaming Gear',
                'description' => 'Gaming consoles, controllers, and gaming accessories',
            ],
            [
                'name' => 'Cameras',
                'description' => 'Digital cameras, lenses, and photography accessories',
            ],
            [
                'name' => 'Smart Home',
                'description' => 'Smart home devices, automation systems, and IoT gadgets',
            ],
            [
                'name' => 'Wearables',
                'description' => 'Smartwatches, fitness trackers, and wearable technology',
            ],
            [
                'name' => 'Networking',
                'description' => 'Routers, switches, network cards, and connectivity solutions',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Various accessories for electronic devices and gadgets',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}