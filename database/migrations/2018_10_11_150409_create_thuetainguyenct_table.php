<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuetainguyenctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuetainguyenct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('level')->nullable();
            $table->string('cap1')->nullable();
            $table->string('cap2')->nullable();
            $table->string('cap3')->nullable();
            $table->string('cap4')->nullable();
            $table->string('cap5')->nullable();
            $table->text('ten')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gia')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::dropIfExists('thuetainguyenct');
    }
}
