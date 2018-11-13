<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadatctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadatctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vitridiadiem')->nullable();
            $table->string('mucgiasan')->nullable();
            $table->string('mucgiadaugia')->nullable();
            $table->string('donvidaugia')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('district')->nullable();
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
        Schema::dropIfExists('daugiadatctdf');
    }
}
