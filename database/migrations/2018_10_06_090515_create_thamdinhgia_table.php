<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamdinhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamdinhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diadiem')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('ppthamdinh')->nullable();
            $table->string('mucdich')->nullable();
            $table->string('dvyeucau')->nullable();
            $table->date('thoihan')->nullable();
            $table->string('sotbkl')->nullable();
            $table->string('hosotdgia')->nullable();
            $table->string('nguonvon')->nullable();
            $table->string('phanloai',20)->nullable();
            $table->string('trangthai')->nullable();
            $table->string('quy')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahs')->nullable();
            $table->string('thuevat')->nullable();
            $table->string('songaykq')->nullable();
            $table->string('tttstd')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('congbo')->nullable();
            $table->string('thaotac')->nullable();

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
        Schema::dropIfExists('thamdinhgia');
    }
}
