<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cart_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->date('rental_start_date')->nullable();
            $table->integer('days')->nullable();
            $table->double('price_current');
            $table->double('count');
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart_items');
    }
}