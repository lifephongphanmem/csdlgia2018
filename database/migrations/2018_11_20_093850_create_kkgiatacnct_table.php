<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkgiatacnctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkgiatacnct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->string('tenhh')->nullable();
            $table->text('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dongialk')->nullable();
            $table->string('dongia')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();

//            $table->string('cpnvlttlk')->nullable();
//            $table->string('cpncttlk')->nullable();
//            $table->string('cpsxclk')->nullable();
//            $table->string('cpnvpxlk')->nullable();
//            $table->string('cpvllk')->nullable();
//            $table->string('cpdcsxlk')->nullable();
//            $table->string('cpkhtscdlk')->nullable();
//            $table->string('cpdvmnlk')->nullable();
//            $table->string('cpbtklk')->nullable();
//            $table->string('cpklk')->nullable();
//            $table->string('tcpsxlk')->nullable();
//            $table->string('cpbhlk')->nullable();
//            $table->string('cpqldnlk')->nullable();
//            $table->string('cptclk')->nullable();
//            $table->string('tgttblk')->nullable();
//            $table->string('lndklk')->nullable();
//            $table->string('gbctlk')->nullable();
//            $table->string('thuettdblk')->nullable();
//            $table->string('thuegtgtlk')->nullable();
//            $table->string('gbdctlk')->nullable();
//
//            $table->string('cpnvltt')->nullable();
//            $table->string('cpnctt')->nullable();
//            $table->string('cpsxc')->nullable();
//            $table->string('cpnvpx')->nullable();
//            $table->string('cpvl')->nullable();
//            $table->string('cpdcsx')->nullable();
//            $table->string('cpkhtscd')->nullable();
//            $table->string('cpdvmn')->nullable();
//            $table->string('cpbtk')->nullable();
//            $table->string('cpk')->nullable();
//            $table->string('tcpsx')->nullable();
//            $table->string('cpbh')->nullable();
//            $table->string('cpqldn')->nullable();
//            $table->string('cptc')->nullable();
//            $table->string('tgttb')->nullable();
//            $table->string('lndk')->nullable();
//            $table->string('gbct')->nullable();
//            $table->string('thuettdb')->nullable();
//            $table->string('thuegtgt')->nullable();
//            $table->string('gbdct')->nullable();
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
        Schema::dropIfExists('kkgiatacnct');
    }
}
