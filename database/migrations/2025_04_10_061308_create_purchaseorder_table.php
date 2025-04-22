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
        Schema::create('purchaseorder', function (Blueprint $table) {
            $table->bigIncrements('purchaseorderID')->unsigned();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('SupplierID');
            $table->dateTime('OrderDate');
            $table->dateTime('DeliveryDate')->nullable();
            $table->timestamps();
        
            // ✅ Correct foreign key to match users.id
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('SupplierID')->references('SupplierID')->on('supplier')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaseorder');
    }
};
