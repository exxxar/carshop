<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('vinrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vincode')->nullable();
            $table->string('year')->nullable();
            $table->string('carmake')->nullable();
            $table->string('power')->nullable();
            $table->string('month')->nullable();
            $table->string('category')->nullable();
            $table->string('model')->nullable();
            $table->string('volume')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('cylinders')->nullable();
            $table->string('body_type')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('gearbox_type')->nullable();
            $table->string('steering_wheel')->nullable();
            $table->string('options')->nullable();
            $table->string('equipment')->nullable();
            $table->string('valves')->nullable();
            $table->string('number_of_doors')->nullable();
            $table->string('drive')->nullable();
            $table->string('gearbox_number')->nullable();

            $table->string('session')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinrequests');
    }
}
