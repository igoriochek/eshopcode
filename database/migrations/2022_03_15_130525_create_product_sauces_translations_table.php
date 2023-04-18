<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaucesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sauces_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_sauce_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['product_sauce_id', 'locale']);
            $table->foreign('product_sauce_id')
                ->references('id')
                ->on('product_sauces')
                ->onDelete('cascade');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sauces_translations');
    }
}
