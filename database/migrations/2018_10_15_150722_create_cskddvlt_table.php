<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCskddvltTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cskddvlt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('macskd')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('tencskd')->nullable();
            $table->string('loaihang')->nullable();
            $table->string('diachikd')->nullable();
            $table->string('telkd')->nullable();
            $table->string('link')->nullable();
            $table->string('avatar')->nullable();
            $table->string('town')->nullable();
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
        Schema::dropIfExists('cskddvlt');
    }
}
