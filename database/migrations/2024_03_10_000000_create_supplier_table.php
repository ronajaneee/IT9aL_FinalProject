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
        Schema::create('supplier', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Add this to ensure consistent engine type
            $table->id('SupplierID'); // The id() method already creates an unsigned bigInteger
            $table->string('SupplierName', 100);
            $table->string('Address', 255)->nullable();
            $table->string('Email', 255)->nullable();
            $table->string('ContactNumber', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};