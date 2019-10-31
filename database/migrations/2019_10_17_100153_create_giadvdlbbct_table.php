<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadvdlbbctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadvdlbbct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->text('tthhdv')->nullable();
            $table->string('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dongialk')->nullable();
            $table->string('dongia')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('thuevat')->nullable();
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
        Schema::dropIfExists('giadvdlbbct');
    }
}
