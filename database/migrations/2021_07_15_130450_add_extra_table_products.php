<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('promotional_price')->nullable();
            $table->date('discount_start_date')->nullable();
            $table->date('discount_end_date')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('warehouse_management')->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('pre-order_allowed')->nullable();
            $table->integer('out_of_stock_threshold')->nullable();
            $table->boolean('sold_separately')->nullable();
            $table->float('weight')->nullable();
            $table->float('long_size')->nullable();
            $table->float('wide_size')->nullable();
            $table->float('high_size')->nullable();
            $table->text('properties')->nullable();
            $table->string('payment_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('promotional_price');
            $table->dropColumn('discount_start_date');
            $table->dropColumn('discount_end_date');
            $table->dropColumn('sku');
            $table->dropColumn('warehouse_management');
            $table->dropColumn('stock');
            $table->dropColumn('pre-order_allowed');
            $table->dropColumn('out_of_stock_threshold');
            $table->dropColumn('sold_separately');
            $table->dropColumn('weight');
            $table->dropColumn('long_size');
            $table->dropColumn('wide_size');
            $table->dropColumn('high_size');
            $table->dropColumn('properties');
            $table->dropColumn('payment_note');
        });
    }
}
