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
                'description' => 'Latest smartphones from various brands',
            ],
            [
                'name' => 'Laptops',
                'description' => 'Professional and gaming laptops',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Phone and laptop accessories',
            ],
            [
                'name' => 'Audio',
                'description' => 'Headphones, earbuds, and speakers',
            ],
            [
                'name' => 'Gaming',
                'description' => 'Gaming consoles and accessories',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
