<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('favorite_products', function (Blueprint $table) {
        $table->increments('favorite_id');
        $table->unsignedInteger('product_id');
        $table->unsignedInteger('user_id');
        
        $table->foreign('product_id')->references('product_id')->on('products');
        $table->foreign('user_id')->references('user_id')->on('users');
        
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
        Schema::dropIfExists('favorite_product');
    }
}
