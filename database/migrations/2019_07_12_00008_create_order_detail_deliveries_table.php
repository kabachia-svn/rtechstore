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
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('order_detail_id');
        });

        Schema::table('order_detail_deliveries', function (Blueprint $table) {
            $table->foreign('delivery_id')->references('delivery_id')->on('deliveries');
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details');
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
