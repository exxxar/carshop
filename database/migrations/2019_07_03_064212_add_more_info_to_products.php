<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreInfoToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->string('manufacturer_number')->nullable();//номер от производителя
            $table->string('original_number')->nullable();//оригиналный номер
            $table->integer('min_in_pack')->nullable();//минимально в упаковке
            $table->string('units')->nullable();// единицы измерения
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products' ,'manufacturer_number')) {
                $table->dropColumn('manufacturer_number');
            }
            if (Schema::hasColumn('products' ,'original_number')) {
                $table->dropColumn('original_number');
            }
            if (Schema::hasColumn('products' ,'min_in_pack')) {
                $table->dropColumn('min_in_pack');
            }
            if (Schema::hasColumn('products' ,'units')) {
                $table->dropColumn('units');
            }
        });
    }
}
