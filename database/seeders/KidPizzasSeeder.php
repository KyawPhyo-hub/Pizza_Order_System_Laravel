<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KidPizzasSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $pizzas = [
            // 👶 Kids Special (category_id = 7) — Small size
        [
            'name' => 'Sweetcorn Surprise',
            'description' => 'Mozzarella and sweetcorn with a creamy finish.',
            'price' => 5.99,
            'category_id' => 7,
            'image' => '1756437323.jpg',
        ],
            ['name' => 'Mac & Cheese Pizza',
            'description' => 'Classic mac and cheese served pizza-style.', 'price' => 6.99, 'category_id' => 7,
            'image' => '1756437243.jpg',],
            ['name' => 'Rainbow Veggie Pizza', 'description' => 'Colorful bell peppers and sweetcorn on tomato base.', 'price' => 5.50, 'category_id' => 7,'image' => '1756437276.jpg',],
            ['name' => 'Chocolate Dessert Pizza', 'description' => 'Dessert pizza with Nutella, banana, and marshmallows.', 'price' => 4.99, 'category_id' => 7,'image' => '1756439621.jpg',],

            // 🧀 Cheese Lover (category_id = 5) — Large size
            ['name' => 'Cheese Volcano', 'description' => 'Molten cheese-filled crust with triple cheese topping.', 'price' => 8.50, 'category_id' => 5,
            'image' => '1756439641.jpg',],
            ['name' => 'Creamy Ticotta Heaven', 'description' => 'Ricotta, mozzarella and parmesan on creamy white sauce.', 'price' => 7.99, 'category_id' => 5,
            'image' => '1756440213.jpg',],
            ['name' => 'Smoked Cheese Supreme', 'description' => 'Smoked gouda, cheddar, and mozzarella combo.', 'price' => 9.20, 'category_id' => 5,
            'image' => '1756440232.jpg',],
            ['name' => 'Cheese Fountain Pizza', 'description' => 'Cheese-stuffed crust with a cheesy center surprise.', 'price' => 10.00, 'category_id' => 5,
            'image' => '1756440248.jpg',],

            // 🌶️ Spicy Pizza (category_id = 6) — Large size
            ['name' => 'Firecracker Pizza', 'description' => 'Jalapeños, spicy sausage, chili flakes & hot sauce.', 'price' => 9.99, 'category_id' => 6,
            'image' => '1756440264.jpg',],
            ['name' => 'Spicy Inferno', 'description' => 'Ghost pepper base, pepperoni and chili oil drizzle.', 'price' => 10.50, 'category_id' => 6,
            'image' => '1756440286.jpg',],
            ['name' => 'Hot n\' Smokey BBQ', 'description' => 'Spicy BBQ chicken with smoked paprika.', 'price' => 9.50, 'category_id' => 6,
            'image' => '1756440305.jpg'],
            ['name' => 'Chili Chicken Crunch', 'description' => 'Crispy spicy chicken, onions and green chilies.', 'price' => 8.99, 'category_id' => 6,
            'image' => '1756440328.jpg',],
            ['name' => 'Volcano Blast Pizza', 'description' => 'Cheese crust, spicy pepperoni and red chilies.', 'price' => 9.25, 'category_id' => 6,
            'image' => '1756439665.jpg',],
            ['name' => 'Peri-Peri Punch', 'description' => 'Peri-peri grilled chicken with spicy mayo.', 'price' => 9.75, 'category_id' => 6,
            'image' => '1756440347.jpg',],
            ['name' => 'Hot Pepper Parade', 'description' => 'Jalapeños, banana peppers and crushed chilies.', 'price' => 8.75, 'category_id' => 6,
            'image' => '1756440366.jpg',],
            ['name' => 'Burning Cheese Lava', 'description' => 'Cheese center with hot sauce swirl.', 'price' => 10.99, 'category_id' => 6,
            'image' => '1756440382.jpg',],
        ];

        foreach ($pizzas as $pizza) {
            DB::table('pizzas')->updateOrInsert(
                ['name' => $pizza['name']], // Unique key
                [
                    'description' => $pizza['description'],
                    'price' => $pizza['price'],
                    'size' => $pizza['category_id'] == 7 ? 'Small' : 'Large',
                    'category_id' => $pizza['category_id'],
                    'status' => 'Available',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
