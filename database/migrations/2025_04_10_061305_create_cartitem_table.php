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
        Schema::create('cartitem', function (Blueprint $table) {
            $table->id('CartitemID')->unsigned();
            $table->unsignedBigInteger('CartID')->nullable();
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('user_id');
            $table->integer('Quantity')->default(1);
            $table->decimal('UnitPrice', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('CartID')->references('cartID')->on('cart')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onUpdate('cascade');
            $table->foreign('user_id')->references('UserID')->on('users')->onDelete('cascade'); // <-- fixed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartitem');
    }
};
