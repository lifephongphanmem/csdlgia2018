<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCungcapgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cungcapgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('congbo')->nullable();
            $table->string('lydo')->nullable();
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
        Schema::dropIfExists('cungcapgia');
    }
}
