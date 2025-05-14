<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create the 'order_items' table
        Schema::create('order_items', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure the table uses InnoDB
            $table->id();
            $table->unsignedBigInteger('order_id'); // Matching the 'orders' table id type
            $table->unsignedBigInteger('product_id'); // Matching the 'products' table 'id' type
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Foreign key for 'order_id' referencing 'orders' table
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
            
            // Make sure this matches the 'products' table's primary key definition
            // The key is that the data types match exactly
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};