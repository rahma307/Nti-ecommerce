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
        $table->string('image');         
        $table->text('description');     
          $table->decimal('price', 8, 2)->nullable();  
         $table->decimal('original_price', 8, 2)->nullable();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->boolean('sale')->default(false);
        $table->boolean('new')->default(false);
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