<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHstonghopChitietCpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hstonghop_chitiet_cpi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('mahh')->nullable();
            $table->string('magoc')->nullable();
            $table->string('macapdo')->nullable();
            $table->string('capdo')->nullable();
            $table->double('quyenso')->default(0);
            $table->string('tenhh')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('ghichu')->nullable();
            $table->double('sapxep')->default(999);
            $table->double('giahh')->default(0);
            $table->double('chiso')->default(0);
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
        Schema::dropIfExists('hstonghop_chitiet_cpi');
    }
}
