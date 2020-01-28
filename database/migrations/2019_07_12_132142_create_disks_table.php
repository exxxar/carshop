<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('disc_width')->nullable();
            $table->string('diameter')->nullable();
            $table->string('radius')->nullable();
            $table->string('holes')->nullable();
            $table->string('pcd')->nullable();
            $table->string('dco')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('disks');
    }
}
