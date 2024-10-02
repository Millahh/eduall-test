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
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('screen_size');
            $table->string('color')->nullable();
            $table->string('harddisk')->nullable();
            $table->string('cpu');
            $table->string('ram');
            $table->string('OS');
            $table->string('special_features')->nullable();
            $table->string('graphics');
            $table->string('graphics_coprocessor')->nullable();
            $table->string('cpu_speed')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->decimal('price', 10, 2);
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
