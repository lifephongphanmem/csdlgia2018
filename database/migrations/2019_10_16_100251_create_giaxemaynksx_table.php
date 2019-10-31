<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaxemaynksxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaxemaynksx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->date('ngayhieuluc')->nullable();
            $table->string('socv')->nullable();
            $table->string('socvlk')->nullable();
            $table->string('ngaycvlk')->nullable();
            $table->text('ytcauthanhgia')->nullable();
            $table->text('thydggadgia')->nullable();
            $table->string('nguoinop')->nullable();
            $table->string('dtll')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('sohsnhan')->nullable();
            $table->dateTime('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('plhs')->nullable();
            $table->string('thoihan')->nullable();
            $table->string('dvt')->nullable();
            $table->string('congbo')->nullable();
            $table->text('ghichu')->nullable();
            $table->text('ptnguyennhan')->nullable();
            $table->text('chinhsachkm')->nullable();
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
        Schema::dropIfExists('giaxemaynksx');
    }
}
