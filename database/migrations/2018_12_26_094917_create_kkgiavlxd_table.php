<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkgiavlxdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkgiavlxd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->text('thqd')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('socv')->nullable();
            $table->string('socvlk')->nullable();
            $table->date('ngaycvlk')->nullable();
            $table->date('ngayhieuluc')->nullable();
            $table->string('nguoinop')->nullable();
            $table->string('dtll')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('sohsnhan')->nullable();
            $table->text('ghichu')->nullable();
            $table->text('ptnguyennhan')->nullable();
            $table->text('chinhsachkm')->nullable();
            $table->dateTime('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('plhs')->nullable();
            $table->string('thoihan')->nullable();
            $table->string('congbo')->nullable();
            $table->string('ipt1')->nullable();
            $table->string('ipf1')->nullable();
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
        Schema::dropIfExists('kkgiavlxd');
    }
}
