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
            $table->id();
            $table->double('price')->nullable();
            $table->integer('count')->default(0);
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->integer('visible')->default(1);
            $table->float('small')->nullable();
            $table->float('big')->nullable();
            $table->boolean('hasSizes')->default(false);
            $table->boolean('hasMeats')->default(false);
            $table->boolean('hasSauces')->default(false);
            $table->unsignedBigInteger("promotion_id")->nullable()->unsigned();
            $table->unsignedBigInteger("discount_id")->nullable()->unsigned();
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
