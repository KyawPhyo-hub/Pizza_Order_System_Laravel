<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ComboSeeder;
use Database\Seeders\PizzaSeeder;
use Database\Seeders\CombosSeeder;
use Database\Seeders\PizzasSeeder;
use Database\Seeders\DessertSeeder;
use Database\Seeders\ToppingSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\KidPizzasSeeder;
use Database\Seeders\SoftDrinkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            PizzaSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            // PizzasSeeder::class,
            SoftDrinkSeeder::class, // Commented out as the class is missing
            DessertSeeder::class,
            ToppingSeeder::class,
            KidPizzasSeeder::class,
            CombosSeeder::class,
            // Add other seeders here
        ]);
    }
}
