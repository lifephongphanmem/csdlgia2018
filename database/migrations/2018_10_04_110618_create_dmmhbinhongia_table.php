<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmmhbinhongiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmmhbinhongia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mamh')->nullable();
            $table->string('tenmh')->nullable();
            $table->string('hienthi')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('dangkykekhai')->nullable();
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
        Schema::dropIfExists('dmmhbinhongia');
    }
}
