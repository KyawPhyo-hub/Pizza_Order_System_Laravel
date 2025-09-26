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
        Schema::create('cart__toppings', function (Blueprint $table) {
            $table->id(); // This is the only auto-increment primary key
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('user_id'); // Assuming you want to track which user the cart belongs to
            $table->unsignedBigInteger('topping_id');
            $table->string('name'); // Assuming you want to store the name of the topping
            $table->unsignedInteger('price'); // Just an unsigned int, no auto_increment
            $table->timestamps();

            // Optional: add foreign keys if needed
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart__toppings');
    }
};
