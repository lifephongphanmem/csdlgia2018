<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuetainguyenctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuetainguyenctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();
            $table->string('manhom')->nullable();
            $table->string('magoc')->nullable();
            $table->string('mahh')->nullable();
            $table->string('capdo')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('dvt')->nullable();
            $table->string('giatttn')->nullable();
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
        Schema::dropIfExists('thuetainguyenctdf');
    }
}
