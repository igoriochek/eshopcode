<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizes_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_size_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['product_size_id', 'locale']);
            $table->foreign('product_size_id')
                ->references('id')
                ->on('product_sizes')
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
        Schema::dropIfExists('product_sizes_translations');
    }
}
