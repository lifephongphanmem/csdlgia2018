<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiahanghoactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giahanghoact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('mahanghoa')->nullable();
            $table->string('tenhanghoa')->nullable();
            $table->string('thongsokt')->nullable();
            $table->string('xuatxu')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gia')->nullable();
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
        Schema::dropIfExists('giahanghoact');
    }
}
