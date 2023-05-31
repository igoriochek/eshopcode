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
            $table->double('price');
            $table->double('rental_price')->nullable();
            $table->integer('count')->default(0);
            $table->string('image')->nullable(true);
            $table->string('video')->nullable(true);
            $table->integer('visible')->default(1);
            $table->boolean('is_rentable')->default(false);
            $table->unsignedBigInteger("promotion_id")->nullable(true);
            $table->unsignedBigInteger("discount_id")->nullable(true);
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('discount_id')->references('id')->on('discounts');
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
        Schema::drop('products');
    }
}
