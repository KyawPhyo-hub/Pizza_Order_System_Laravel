<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombosSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $combos = [
            [
                'name' => 'Classic Delight Combo',
                'description' => 'Margherita Pizza with 350ml Coca-Cola and a Brownie Dessert. A timeless treat!',
                'pizza_id_1' => 1,
                'pizza_id_2' => null,
                'soft_drink_id' => 1,
                'dessert_id' => 5,
                'price' => 13.99,
                'image' => '1757261154.png',
                'status' => 'available',
                'category_id' => 8,
            ],
            [
                'name' => 'Spicy Lover’s Combo',
                'description' => 'Firecracker and Spicy Inferno Pizza duo with Pepsi and a Chocolate Lava Cake.',
                'pizza_id_1' => 25,
                'pizza_id_2' => 24,
                'soft_drink_id' => 2,
                'dessert_id' => 2,
                'price' => 19.50,
                'image' => '1757261171.png',
                'status' => 'available',
                'category_id' => 8,
            ],
            [
                'name' => 'Cheesy Fantasy Combo',
                'description' => 'Cheese Volcano & Smoked Cheese Supreme with Sprite and Cheesecake.',
                'pizza_id_1' => 20,
                'pizza_id_2' => 22,
                'soft_drink_id' => 3,
                'dessert_id' => 3,
                'price' => 18.99,
                'image' => '1757260978.png',
                'status' => 'available',
                'category_id' => 8,
            ],
            [
                'name' => 'Kids’ Fun Meal',
                'description' => 'Mac & Cheese Pizza, Fanta Orange, and Chocolate Dessert Pizza — made for smiles!',
                'pizza_id_1' => 17,
                'pizza_id_2' => null,
                'soft_drink_id' => 4,
                'dessert_id' => 4,
                'price' => 10.99,
                'image' => '1757261183.png',
                'status' => 'available',
                'category_id' => 8,
            ],
            [
                'name' => 'Meat Feast Combo',
                'description' => 'Pepperoni and BBQ Chicken Pizzas with Coke and a rich Chocolate Cake.',
                'pizza_id_1' => 2,
                'pizza_id_2' => 3,
                'soft_drink_id' => 2,
                'dessert_id' => 2,
                'price' => 20.99,
                'image' => '1757261196.png',
                'status' => 'available',
                'category_id' => 8,
            ],
        ];

        foreach ($combos as $combo) {
            DB::table('combos')->updateOrInsert(
                ['name' => $combo['name']], // unique condition
                array_merge($combo, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
