<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('order_detail_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('product_quantity');
            $table->unsignedBigInteger('delivery_id')->nullable();
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('delivery_id')->references('delivery_id')->on('deliveries');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
