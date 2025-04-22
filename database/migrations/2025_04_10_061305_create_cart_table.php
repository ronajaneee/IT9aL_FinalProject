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
        if (!Schema::hasTable('cart')) {
            Schema::create('cart', function (Blueprint $table) {
                $table->id('cartID')->unsigned();
                $table->unsignedBigInteger('UserID');
                $table->timestamps();

                $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
