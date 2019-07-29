<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuetainguyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuetainguyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matn')->nullable();
            $table->string('manhom')->nullable();
            $table->string('cap1')->nullable();
            $table->string('cap2')->nullable();
            $table->string('cap3')->nullable();
            $table->string('cap4')->nullable();
            $table->string('cap5')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dongia')->nullable();
            $table->string('nam')->nullable();
            $table->string('soqd')->nullbale();
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
        Schema::dropIfExists('thuetainguyen');
    }
}
