<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmthuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmthuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahh')->nullable();
            $table->string('masopnhom')->nullable();
            $table->string('magoc')->nullable();
            $table->string('macapdo')->nullable();
            $table->string('capdo')->nullable();
            $table->string('masp')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('giatu')->nullable();
            $table->string('giaden')->nullable();
            $table->string('gc')->nullable();
            $table->string('thoidiem')->nullable();
            $table->string('sapxep')->nullable();
            $table->string('thuoctn')->nullable();
            $table->string('theodoi')->nullable();
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
        Schema::dropIfExists('dmthuetn');
    }
}
