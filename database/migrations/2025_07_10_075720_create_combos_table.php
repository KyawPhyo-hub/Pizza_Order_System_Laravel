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
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('pizza_id_1')->constrained('pizzas')->onDelete('cascade');
            $table->foreignId('pizza_id_2')->nullable()->constrained('pizzas')->onDelete('cascade');
            $table->unsignedBigInteger('soft_drink_id');
            $table->foreignId('dessert_id')->constrained('desserts')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->string('status')->default('avaliable');
            $table->timestamps();

            $table->foreign('soft_drink_id')->references('id')->on('soft_drinks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combos');
    }
};
