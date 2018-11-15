<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuemuanhaxhctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuemuanhaxhctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('loainha')->nullable();
            $table->string('dongia')->nullable();
            $table->string('thoigian')->nullable();
            $table->string('hesodc')->nullable();
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
        Schema::dropIfExists('giathuemuanhaxhctdf');
    }
}
