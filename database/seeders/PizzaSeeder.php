<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        $pizzas = [
            [
                'name' => 'Margherita',
                'description' => 'A timeless Italian favorite with fresh basil, tomato sauce, and creamy mozzarella cheese for a simple yet flavorful experience.',
                'price' => 11.99,
                'image' => '1751946853.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Pepperoni',
                'description' => 'An all-time classic loaded with spicy, crispy pepperoni and gooey mozzarella over a rich tomato base.',
                'price' => 9.99,
                'image' => '1750845772.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'BBQ Chicken',
                'description' => 'Smoky BBQ sauce topped with tender grilled chicken, red onions, and fresh cilantro for a sweet and tangy twist.',
                'price' => 10.99,
                'image' => '1750845796.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Hawaiian',
                'description' => 'A unique blend of sweet pineapple chunks and savory ham, balanced perfectly with melted cheese and tomato sauce.',
                'price' => 11.49,
                'image' => '1750851882.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Meat Lover\'s',
                'description' => 'A hearty pizza piled high with pepperoni, sausage, ham, and bacon for the ultimate meat experience.',
                'price' => 11.99,
                'image' => '1750851936.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Veggie Supreme',
                'description' => 'Packed with a colorful mix of bell peppers, onions, mushrooms, and olives over a savory tomato base.',
                'price' => 11.29,
                'image' => '1750851971.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Four Cheese',
                'description' => 'A rich, creamy blend of mozzarella, cheddar, parmesan, and gorgonzola melted to perfection.',
                'price' => 10.49,
                'image' => '1750851988.jpg',
                'size' => 'Large',
                'category_id' => 5,
                'status' => 'Available',
            ],
            [
                'name' => 'Buffalo Chicken',
                'description' => 'Spicy buffalo sauce layered with grilled chicken and onions, finished with a drizzle of ranch dressing.',
                'price' => 10.79,
                'image' => '1750852082.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Tuna & Onion',
                'description' => 'A coastal favorite with flaked tuna, sliced red onions, and a touch of herbs over mozzarella.',
                'price' => 11.59,
                'image' => '1750852101.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Truffle Mushroom',
                'description' => 'A gourmet pizza with wild mushrooms, garlic, and truffle oil on a creamy white sauce base.',
                'price' => 12.49,
                'image' => '1750852134.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Spicy Sausage',
                'description' => 'Bold and flavorful, this pizza is topped with spicy sausage, red pepper flakes, and mozzarella.',
                'price' => 10.29,
                'image' => '1750852155.jpg',
                'size' => 'Large',
                'category_id' => 2,
                'status' => 'Available',
            ],
            [
                'name' => 'Paneer Tikka',
                'description' => 'A fusion favorite with marinated paneer, onions, capsicum, and Indian spices on a cheesy base.',
                'price' => 11.99,
                'image' => '1750852188.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Cheesy Garlic',
                'description' => 'Loaded with garlic, mozzarella, and herbs for a rich and savory cheese lover\'s dream.',
                'price' => 11.49,
                'image' => '1750852220.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Mexican Fiesta',
                'description' => 'A fiery mix of jalapeños, sweet corn, onions, and beans with a spicy tomato base.',
                'price' => 11.79,
                'image' => '1750852034.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
            [
                'name' => 'Supreme Deluxe',
                'description' => 'A loaded combo of meats and veggies including pepperoni, sausage, peppers, and olives.',
                'price' => 12.99,
                'image' => '1750852012.jpg',
                'size' => 'Large',
                'category_id' => 1,
                'status' => 'Available',
            ],
        ];

        foreach ($pizzas as $pizza) {
            DB::table('pizzas')->updateOrInsert(
                ['name' => $pizza['name']],
                array_merge($pizza, [
                    'created_at' => $now,
                    'updated_at' => $now
                ])
            );
        }
    }
}
