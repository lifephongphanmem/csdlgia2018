<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiagocvlxdctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giagocvlxdct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->text('tenhhdv')->nullable();
            $table->text('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->string('giagoc')->nullable();
            $table->string('qcad')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::dropIfExists('giagocvlxdct');
    }
}
