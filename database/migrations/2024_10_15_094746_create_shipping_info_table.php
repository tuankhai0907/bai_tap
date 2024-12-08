<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->unsignedInteger('order_id');
            $table->string('shipping_method', 255);
            $table->decimal('shipping_fee', 10, 2);
            $table->string('shipping_status', 50);
            
            $table->foreign('order_id')->references('order_id')->on('orders');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_info');
    }
}
