<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidAccessoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_accessories_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paid_accessory_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['paid_accessory_id', 'locale']);
            $table->foreign('paid_accessory_id')
                ->references('id')
                ->on('paid_accessories')
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
        Schema::dropIfExists('paid_accessories_translations');
    }
}
