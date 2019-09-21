<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadat', function (Blueprint $table) {
            $table->increments('id');
            /*$table->string('soqd')->nullable();
            $table->string('diadiem')->nullable();
            $table->string('donvi')->nullable();
            $table->string('tgdaugia')->nullable();
            $table->string('tgddbanhsdaugia')->nullable();
            $table->text('dkdaugia')->nullable();
            $table->text('htdaugia')->nullable();
            $table->string('thdaugia')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('mahs')->nullable();
            $table->string('district')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();*/
//            $table->text('mota')->nullable();
//            $table->string('totrinh')->nullable();
//            $table->string('ttqd')->nullable();
//            $table->date('ngaydaugia')->nullable();
//            $table->string('giadau')->nullable();
//            $table->string('ttkhtrung')->nullable();
//            $table->string('chenhlech')->nullable();
//            $table->string('mahs')->nullable();
//            $table->string('ipt1')->nullable();
//            $table->string('ipf1')->nullable();
//            $table->string('ipt2')->nullable();
//            $table->string('ipf2')->nullable();
//            $table->string('ipt3')->nullable();
//            $table->string('ipf3')->nullable();
//            $table->string('ipt4')->nullable();
//            $table->string('ipf4')->nullable();
//            $table->string('ipt5')->nullable();
//            $table->string('ipf5')->nullable();
//            $table->string('trangthai')->nullable();
//            $table->string('congbo')->nullable();
//            $table->text('ghichu')->nullable();
//            $table->string('district')->nullable();
//            $table->string('maxa')->nullable();
//            $table->string('mahuyen')->nullable();
//            $table->string('ttthaotac')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('tenduan')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('dientich')->nullable();
            $table->string('soqdpagia')->nullable();
            $table->string('soqddaugia')->nullable();
            $table->string('soqdgiakhoidiem')->nullable();
            $table->string('soqdkqdaugia')->nullable();
            $table->string('mahs')->nullable();
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
        Schema::dropIfExists('daugiadat');
    }
}
