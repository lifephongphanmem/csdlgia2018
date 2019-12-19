<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGialptbnhactxdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gialptbnhactxdm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('district')->nullable();
            $table->string('loaict')->nullable();
            $table->string('capnha')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dongia')->nullable();
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
        Schema::dropIfExists('gialptbnhactxdm');
    }
}
