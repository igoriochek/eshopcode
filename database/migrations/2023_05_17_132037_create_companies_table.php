<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('code');
            $table->string('vat_code')->nullable();
            $table->unsignedBigInteger('order_id')->unsigned()->nullable();
            $table->unsignedBigInteger('return_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('return_id')->references('id')->on('returns');
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
        Schema::dropIfExists('companies');
    }
}
