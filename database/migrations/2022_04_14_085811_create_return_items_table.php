<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('return_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('product_size_id')->unsigned()->nullable();
            $table->unsignedBigInteger('product_meat_id')->unsigned()->nullable();
            $table->unsignedBigInteger('product_sauce_id')->unsigned()->nullable();
            $table->string('paid_accessories')->nullable();
            $table->string('free_accessories')->nullable();
            $table->double('price_current');
            $table->double('count');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('return_id')->references('id')->on('returns');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->foreign('product_meat_id')->references('id')->on('product_meats');
            $table->foreign('product_sauce_id')->references('id')->on('product_sauces');
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
        Schema::drop('return_items');
    }
}
