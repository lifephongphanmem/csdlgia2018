<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaTaiSanCongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giataisancong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mataisan')->nullable();
            $table->string('district')->nullable();
            $table->string('thongtinhs')->nullable();
            $table->date('thoidiemtu')->nullable();
            $table->date('thoidiemden')->nullable();
            $table->double('giathue')->default(0);
            $table->string('ghichu')->nullable();
            $table->string('mahs')->nullable();
            $table->string('soqd')->nullable();
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
        Schema::dropIfExists('giataisancong');
    }
}
