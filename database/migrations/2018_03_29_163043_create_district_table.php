<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('tendv')->nullable();
            $table->string('district')->nullable();
            $table->string('diachi')->nullable();
            $table->string('phanloaiql')->nullable();
            $table->text('ttlienhe')->nullable();
            $table->string('emailql')->nullable();
            $table->string('emailqt')->nullable();
            $table->string('tendvhienthi')->nullable();
            $table->string('tendvcqhienthi')->nullable();
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
        Schema::dropIfExists('district');
    }
}
