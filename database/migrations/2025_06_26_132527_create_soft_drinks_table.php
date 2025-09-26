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
        Schema::create('soft_drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 6, 2);
            $table->string('size');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id'); // ✅ define this first
            $table->string('status');
            $table->timestamps();

            // ✅ Then add the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soft_drinks');
    }
};
