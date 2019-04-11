<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThgiagocvlxdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thgiagocvlxd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('sobc')->nullable();
            $table->string('ngaybc')->nullable();
            $table->string('dvbc')->nullable();
            $table->string('dvcq')->nullable();
            $table->string('diadanh')->nullable();
            $table->string('diabanbc')->nullable();
            $table->string('mahs')->nullable();
            $table->string('ttthaotac')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('congbo')->nullable();
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
        Schema::dropIfExists('thgiagocvlxd');
    }
}
