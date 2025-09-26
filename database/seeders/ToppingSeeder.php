<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $toppings = [
            ['name' => 'Extra Cheese', 'price' => 1.50, 'status' => 'available'],
            ['name' => 'Pepperoni', 'price' => 1.70, 'status' => 'available'],
            ['name' => 'Mushrooms', 'price' => 1.20, 'status' => 'available'],
            ['name' => 'Onions', 'price' => 1.00, 'status' => 'available'],
            ['name' => 'Black Olives', 'price' => 1.30, 'status' => 'available'],
            ['name' => 'Green Peppers', 'price' => 1.00, 'status' => 'available'],
            ['name' => 'Pineapple', 'price' => 1.50, 'status' => 'available'],
            ['name' => 'Sausage', 'price' => 1.80, 'status' => 'available'],
            ['name' => 'Bacon', 'price' => 2.00, 'status' => 'available'],
            ['name' => 'Spinach', 'price' => 1.20, 'status' => 'available'],
            ['name' => 'Jalapeños', 'price' => 1.10, 'status' => 'available'],
        ];

        foreach ($toppings as $topping) {
            DB::table('toppings')->updateOrInsert(
                ['name' => $topping['name']], // condition (unique key)
                [
                    'price'      => $topping['price'],
                    'status'     => $topping['status'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
