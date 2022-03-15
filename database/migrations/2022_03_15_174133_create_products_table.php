<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->double('price');
            $table->integer('count');
            $table->text('description');
            $table->string('image');
            $table->string('video');
            $table->integer('visible');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger("promotion_id");
            $table->unsignedBigInteger("discount_id");
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
