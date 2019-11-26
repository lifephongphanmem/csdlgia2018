<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathitruongctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathitruongct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('manhom')->nullable();
            $table->string('tennhom')->nullable();
            $table->string('mahh')->nullable();
            $table->string('tenhh')->nullable();
            $table->text('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('loaigia')->nullable();
            $table->double('dongia')->nullable();
            $table->text('nguontt')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai',5)->nullable();
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
        Schema::dropIfExists('giathitruongct');
    }
}
