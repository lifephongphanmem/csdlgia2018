<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHstonghopCpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hstonghop_cpi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->unique();
            $table->string('soqd')->nullable();
            $table->date('tgnhap')->nullable();
            $table->string('nam')->nullable();
            $table->string('thang')->nullable();
            $table->text('noidung')->nullable();

            $table->text('ttnguoinop')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('sohsnhan')->nullable();
            $table->dateTime('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();

            $table->string('trangthai')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();//mã địa bàn
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
        Schema::dropIfExists('hstonghop_cpi');
    }
}
