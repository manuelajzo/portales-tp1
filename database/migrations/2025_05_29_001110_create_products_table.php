<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2)->nullable();
        $table->string('category')->nullable();
        $table->boolean('is_available')->default(true);
        $table->integer('duration_minutes')->nullable(); // Duration in minutes for services
        $table->string('difficulty_level')->nullable(); // Beginner, Intermediate, Advanced
        $table->text('whats_included')->nullable(); // What's included in the service/product
        $table->string('delivery_method')->nullable(); // Online, In-person, Hybrid
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
