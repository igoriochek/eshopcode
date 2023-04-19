<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeAccessoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_accessories_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('free_accessory_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['free_accessory_id', 'locale']);
            $table->foreign('free_accessory_id')
                ->references('id')
                ->on('free_accessories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('free_accessories_translations');
    }
}
