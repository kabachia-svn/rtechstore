<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_deliveries', function (Blueprint $table) {
            $table->bigInteger('delivery_id')->references('delivery_id')->on('deliveries');
            $table->bigInteger('order_id')->references('order_id')->on('orders');
            $table->bigInteger('order_detail_id')->references('order_detail_id')->on('order_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail_deliveries');
    }
}
