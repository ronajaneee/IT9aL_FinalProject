<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            // First check if the foreign key constraint exists
            $foreignKeys = [];
            // Only drop if foreign key exists

            // Check if column exists before dropping
            if (Schema::hasColumn('order_items', 'product_id')) {
                try {
                    $table->dropForeign(['product_id']);
                } catch (\Exception $e) {
                    // do nothing
                }
                $table->dropColumn('product_id');
            }
        });

        // Add the column back with correct references
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            if (DB::select("SHOW KEYS FROM `order_items` WHERE Key_name = 'order_items_product_id_foreign'")) {
                $table->dropForeign(['product_id']); // Drop foreign key constraint
            }
            $table->dropColumn('product_id');  // Drop the product_id column if it exists
        });
    }
};
