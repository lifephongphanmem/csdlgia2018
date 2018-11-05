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
            $table->string('vitridiadiem')->nullable();
            $table->string('mucgiasan')->nullable();
            $table->string('mucgiadaugia')->nullable();
            $table->string('donvidaugia')->nullable();
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
