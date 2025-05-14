<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('purchaseorderitem')) {
            Schema::create('purchaseorderitem', function (Blueprint $table) {
                $table->bigIncrements('purchaseorderitemID');
                $table->unsignedBigInteger('PurchaseOrderID');
                $table->unsignedBigInteger('ProductID');
                $table->integer('Quantity');
                $table->decimal('UnitPrice', 10, 2);
                $table->timestamps();

                $table->foreign('PurchaseOrderID')->references('id')->on('purchaseorders')->onDelete('cascade');
                $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaseorderitem');
    }
};
