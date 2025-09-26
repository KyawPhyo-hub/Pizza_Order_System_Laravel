<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DessertSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $desserts = [
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'A warm chocolate cake with a molten chocolate center.',
                'price' => 4.99,
                'image' => '1757259157.jpg',
            ],
            [
                'name' => 'Classic Tiramisu',
                'description' => 'Layered espresso-soaked ladyfingers with mascarpone cream.',
                'price' => 5.49,
                'image' => '1757259177.jpg',
            ],
            [
                'name' => 'Mini Cheesecake Bites',
                'description' => 'Rich and creamy cheesecake in bite-sized portions.',
                'price' => 3.99,
                'image' => '1757259224.jpg',
            ],
            [
                'name' => 'Nutella Calzone',
                'description' => 'A folded dessert pizza filled with Nutella and marshmallows.',
                'price' => 5.99,
                'image' => '1757259239.jpg',
            ],
            [
                'name' => 'Brownie Sundae',
                'description' => 'Warm chocolate brownie topped with vanilla ice cream and syrup.',
                'price' => 4.50,
                'image' => '1757259263.jpg',
            ],
            [
                'name' => 'Cinnamon Sugar Pizza',
                'description' => 'Dessert pizza brushed with butter and topped with cinnamon sugar.',
                'price' => 5.00,
                'image' => '1757259280.jpg',
            ],
            [
                'name' => 'Oreo Crumble Delight',
                'description' => 'A creamy Oreo-based dessert topped with cookie chunks.',
                'price' => 4.75,
                'image' => '1757259294.jpg',
            ],
            [
                'name' => 'Strawberry Cream Slice',
                'description' => 'A refreshing layered dessert with fresh strawberries and cream.',
                'price' => 4.25,
                'image' => '1757259308.jpg',
            ],[
                'name' => 'French Fries',
                'description' => 'Golden, crispy potato fries seasoned to perfection. A classic side loved by all ages — perfect on its own or paired with your favorite pizza or drink.',
                'price' => 3.25,
                'image' => '1757259320.jpg',
            ],
        ];

        foreach ($desserts as $dessert) {
            // Add extra fields
            $dessert['category_id'] = 9;
            $dessert['status'] = 'available';
            $dessert['created_at'] = $now;
            $dessert['updated_at'] = $now;

            // Insert or update one by one
            DB::table('desserts')->updateOrInsert(
                ['name' => $dessert['name']], // condition
                $dessert // values
            );
        }
    }
}



