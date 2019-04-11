<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThgiahhdvkctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thgiahhdvkct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->date('ngaychotbc')->nullable();
            $table->string('manhom')->nullable();
            $table->string('mahhdv')->nullable();
            $table->string('tenhhdv')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('xuatxu')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gialk')->nullable();
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
        Schema::dropIfExists('thgiahhdvkct');
    }
}
