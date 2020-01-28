<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyres', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tyre_width')->nullable();
            $table->string('tyre_height')->nullable();
            $table->string('diameter')->nullable();
            $table->string('tyre_type')->nullable();
            $table->string('seasonality')->nullable();
            $table->string('manufacturer')->nullable();

            $table->integer('vinrequest_id')->unsigned()->nullable();
            $table->foreign('vinrequest_id')->references('id')->on('vinrequests');


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
        Schema::dropIfExists('tyres');
    }
}
