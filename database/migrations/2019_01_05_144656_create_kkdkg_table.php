<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkdkgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkdkg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->text('theoqd')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('socv')->nullable();
            $table->string('socvlk')->nullable();
            $table->date('ngaycvlk')->nullable();
            $table->date('ngayhieuluc')->nullable();
            $table->string('nguoinop',20)->nullable();
            $table->string('dtlh',15)->nullable();
            $table->string('fax',15)->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('sohsnhan')->nullable();
            $table->dateTime('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('plhs')->nullable();
            $table->string('pldn')->nullable();
            $table->string('thoihan')->nullable();
            $table->string('phanloai')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('congbo')->nullable();
            // file đính kèm
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
        Schema::dropIfExists('kkdkg');
    }
}
