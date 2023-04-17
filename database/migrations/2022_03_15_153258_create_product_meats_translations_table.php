<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMeatsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meats_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_meat_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['product_meat_id', 'locale']);
            $table->foreign('product_meat_id')
                ->references('id')
                ->on('product_meats')
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
        Schema::dropIfExists('product_meats_translations');
    }
}
