<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDvkcbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvkcb', function (Blueprint $table) {
            $table->increments('id');
            $table->date('thoidiem')->nullable();
            $table->string('district')->nullable();
            $table->string('tenbv')->nullable();
            $table->text('mota')->nullable();
            $table->string('dvt')->nullable();
            $table->double('dongia')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('ttqd')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('dvkcb');
    }
}
