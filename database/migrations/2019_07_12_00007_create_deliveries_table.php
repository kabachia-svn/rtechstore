<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('delivery_id');
            $table->timestamp('delivery_date');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('order_detail_id');
        });

        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->foreign('order_detail_id')->references('order_detail_id')->on('orderdetails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
