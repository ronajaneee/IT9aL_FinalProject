<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->decimal('total', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
            
            $table->foreign('UserID')
                  ->references('UserID')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
       Schema::table('orders', function (Blueprint $table) {
        // Drop foreign key constraints, if they exist
        // Assuming there is a foreign key in 'order_items' referencing 'orders'
    });

    Schema::dropIfExists('orders');
    }
};
