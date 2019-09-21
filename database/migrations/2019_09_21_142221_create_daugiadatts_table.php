<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadattsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadatts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('tenduan')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('dientichdat')->nullable();
            $table->string('dientichsanxd')->nullable();
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
        Schema::dropIfExists('daugiadatts');
    }
}
