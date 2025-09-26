<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order__toppings', function (Blueprint $table) {
            $table->id();
            $table->integer('order_item_id'); // Foreign key to orders table
            $table->foreignId('topping_id')->constrained('toppings')->onDelete('cascade'); // Foreign key to toppings table
            $table->string('name'); // Name of the topping
            $table->integer('price'); // Price of the topping
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__toppings');
    }
};
