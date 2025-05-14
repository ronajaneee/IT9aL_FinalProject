<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure the table uses InnoDB
            $table->id('ProductID');
            $table->unsignedBigInteger('SupplierID')->nullable();
            $table->string('ProductName', 100);
            $table->string('SKU', 50)->unique();
            $table->text('Description')->nullable();
            $table->string('Image', 255)->nullable();
            $table->decimal('Price', 10, 2);
            $table->integer('Quantity')->default(0);
            $table->string('Category', 100);
            $table->integer('sales')->default(0);
            $table->timestamps();

            $table->foreign('SupplierID')
                ->references('SupplierID')
                ->on('supplier')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

