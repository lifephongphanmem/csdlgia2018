<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkgsctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkgsct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->string('tenhh')->nullable();
            $table->text('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->text('ghichu')->nullable();

            $table->string('giaQlk')->nullable();
            $table->string('giaClk')->nullable();
            $table->string('giaCttlk')->nullable();
            $table->string('giaCvtlk')->nullable();
            $table->string('giaCnclk')->nullable();
            $table->string('giaCkhlk')->nullable();
            $table->string('giaCklk')->nullable();
            $table->string('giaCclk')->nullable();
            $table->string('giaCcmlk')->nullable();
            $table->string('giaCtclk')->nullable();
            $table->string('giaCbhlk')->nullable();
            $table->string('giaCqllk')->nullable();
            $table->string('giaTClk')->nullable();
            $table->string('giaCPlk')->nullable();
            $table->string('giaZlk')->nullable();
            $table->string('giaZdvlk')->nullable();

            $table->string('giaQ')->nullable();
            $table->string('giaC')->nullable();
            $table->string('giaCtt')->nullable();
            $table->string('giaCvt')->nullable();
            $table->string('giaCnc')->nullable();
            $table->string('giaCkh')->nullable();
            $table->string('giaCk')->nullable();
            $table->string('giaCc')->nullable();
            $table->string('giaCcm')->nullable();
            $table->string('giaCtc')->nullable();
            $table->string('giaCbh')->nullable();
            $table->string('giaCql')->nullable();
            $table->string('giaTC')->nullable();
            $table->string('giaCP')->nullable();
            $table->string('giaZ')->nullable();
            $table->string('giaZdv')->nullable();
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
        Schema::dropIfExists('kkgsct');
    }
}
