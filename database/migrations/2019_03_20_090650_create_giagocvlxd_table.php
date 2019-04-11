<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiagocvlxdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giagocvlxd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();
            $table->string('quy')->nullable();
            $table->string('nam')->nullable();
            $table->string('ngaybc')->nullable();
            $table->string('soqd')->nullable();
            $table->string('mahs')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('congbo')->nullable();
            $table->string('ttthaotac')->nullable();
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
        Schema::dropIfExists('giagocvlxd');
    }
}
