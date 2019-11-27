<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadatctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadatct', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('vitridiadiem')->nullable();
//            $table->string('mucgiasan')->nullable();
//            $table->string('mucgiadaugia')->nullable();
//            $table->string('donvidaugia')->nullable();
            $table->string('loaidat')->nullable();
            $table->string('tenduong')->nullable();
            $table->string('loaiduong')->nullable();
            $table->string('vitri')->nullable();

            $table->string('qdgiadato')->nullable();
            $table->string('qdgiadattmdv')->nullable();
            $table->string('qdgiadatsxkd')->nullable();
            $table->string('qdgiadatnn')->nullable();
            $table->string('qdgiadatnuoits')->nullable();
            $table->string('qdgiadatmuoi')->nullable();

            $table->string('qdpddato')->nullable();
            $table->string('qdpddattmdv')->nullable();
            $table->string('qdpddatsxkd')->nullable();
            $table->string('qdpddatnn')->nullable();
            $table->string('qdpddatnuoits')->nullable();
            $table->string('qdpddatmuoi')->nullable();

            $table->string('kqdgdato')->nullable();
            $table->string('kqdgdattmdv')->nullable();
            $table->string('kqdgdatsxkd')->nullable();
            $table->string('kqdgdatnn')->nullable();
            $table->string('kqdgdatnuoits')->nullable();
            $table->string('kqdgdatmuoi')->nullable();
            $table->string('dientich')->nullable();

//            $table->string('giakhoidiem')->nullable();
//            $table->string('giadaugia')->nullable();

            $table->string('mahs')->nullable();
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
        Schema::dropIfExists('daugiadatct');
    }
}
