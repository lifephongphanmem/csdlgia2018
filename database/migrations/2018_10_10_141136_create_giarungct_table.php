<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiarungctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giarungct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('district')->nullable();
            $table->string('manhom')->nullable();
            $table->string('loairung')->nullable();
            $table->string('mucdo')->nullable();
            $table->string('dongiasd')->nullable();
            $table->string('dongiat50')->nullable();
            $table->string('dongiat1')->nullable();
            $table->string('dongiaxp')->nullable();
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
        Schema::dropIfExists('giarungct');
    }
}
