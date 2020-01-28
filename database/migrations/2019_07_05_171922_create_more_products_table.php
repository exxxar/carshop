<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('more_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();//название детали
            $table->string('article')->nullable();//артикул детали
            $table->integer('count')->nullable();//количество деталей
            $table->string('info')->nullable();//дополнительная информация

            $table->integer('vinrequest_id')->unsigned()->nullable();
            $table->foreign('vinrequest_id')->references('id')->on('vinrequests');

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
        Schema::dropIfExists('more_products');
    }
}
