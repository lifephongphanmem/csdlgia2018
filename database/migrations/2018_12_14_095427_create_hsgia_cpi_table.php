<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHsgiaCpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsgia_cpi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->unique();
            $table->string('soqd')->nullable();
            $table->date('tgnhap')->nullable();
            $table->string('nam')->nullable();
            $table->string('thang')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();//mã địa bàn
            $table->string('trangthai')->nullable();
            $table->text('noidung')->nullable();

            $table->string('phanloai')->nullable();//đính kèm / chi tiết
            $table->string('ipt1')->nullable();
            $table->string('ipf1')->nullable();

            $table->string('ipt2')->nullable();
            $table->string('ipf2')->nullable();

            $table->string('ipt3')->nullable();
            $table->string('ipf3')->nullable();

            $table->string('ipt4')->nullable();
            $table->string('ipf4')->nullable();

            $table->string('ipt5')->nullable();
            $table->string('ipf5')->nullable();
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
        Schema::dropIfExists('hsgia_cpi');
    }
}
