<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTransactionItemTable extends Migration
{
    public function up()
    {
        // Check if the table already exists before creating it
        if (!Schema::hasTable('salestransactionitem')) {
            Schema::create('salestransactionitem', function (Blueprint $table) {
                $table->bigIncrements('transactionitemID');
                $table->unsignedBigInteger('TransactionID');
                $table->unsignedBigInteger('ProductID');
                $table->integer('Quantity');
                $table->decimal('UnitPrice', 10, 2);
                $table->timestamps();

                $table->foreign('TransactionID')->references('id')->on('transactions')->onDelete('cascade');
                $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        // Ensure the table is dropped if it exists
        Schema::dropIfExists('salestransactionitem');
    }
}
