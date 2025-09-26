<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Veg'],
            ['name' => 'Non-Veg'],
            ['name' => 'Soft Drink'],
            ['name' => 'Wine'],
            ['name' => 'Cheese Lovers'],       // Recommended
            ['name' => 'Spicy Pizza'],         // Recommended
            ['name' => 'Kids Special'],        // Recommended
            ['name' => 'Combo Deals'],         // Recommended
            ['name' => 'Desserts'],            // Optional
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}

