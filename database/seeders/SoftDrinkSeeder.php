<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\SoftDrink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoftDrinkSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $drinks = [
            [
                'name' => 'Coca-Cola Can',
                'description' => 'Classic refreshing cola taste in a 330ml can.',
                'price' => 1.50,
                'size' => '330ml',
                'image' => '1756442150.jpg',
            ],
            [
                'name' => 'Pepsi Bottle',
                'description' => 'Bold and refreshing cola in a 1L bottle.',
                'price' => 3.50,
                'size' => '1L',
                'image' => '1756442168.jpg',
            ],
            [
                'name' => 'Sprite Can',
                'description' => 'Lemon-lime soda, crisp and clean flavor.',
                'price' => 1.40,
                'size' => '330ml',
                'image' => '1756442179.jpg',
            ],
            [
                'name' => 'Fanta Orange',
                'description' => 'Fruity orange-flavored fizzy drink.',
                'price' => 1.60,
                'size' => '500ml',
                'image' => '1756442191.jpg',
            ],
            [
                'name' => 'Mountain Dew',
                'description' => 'Citrus-charged soft drink for energy and taste.',
                'price' => 1.70,
                'size' => '500ml',
                'image' => '1756442203.jpg',
            ],
            [
                'name' => 'Lipton Iced Tea Lemon',
                'description' => 'Chilled black tea with lemon flavor, non-carbonated.',
                'price' => 1.80,
                'size' => '500ml',
                'image' => '1756442216.jpg',
            ],
            [
                'name' => 'Red Bull',
                'description' => 'Energy drink with taurine and caffeine boost.',
                'price' => 2.20,
                'size' => '250ml',
                'image' => '1756442230.jpg',
            ],
            [
                'name' => 'Minute Maid Orange Juice',
                'description' => '100% orange juice with no added sugar.',
                'price' => 2.00,
                'size' => '400ml',
                'image' => '1756442245.jpg',
            ],
        ];

        foreach ($drinks as $drink) {
            SoftDrink::updateOrInsert(
                ['name' => $drink['name']],
                [
                    'description'  => $drink['description'],
                    'price'        => $drink['price'],
                    'size'         => $drink['size'],
                    'category_id'  => 3, // Soft Drink
                    'status'       => 'available',
                    'image'        => $drink['image'],
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ]
            );
        }
    }
}
