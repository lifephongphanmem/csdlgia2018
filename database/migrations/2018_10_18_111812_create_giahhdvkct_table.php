<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiahhdvkctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giahhdvkct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();
            $table->string('manhom')->nullable();
            $table->string('mahhdv')->nullable();
            $table->string('tenhhdv')->nullable();
            $table->string('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gialk')->nullable();
            $table->string('giá')->nullable();
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
        Schema::dropIfExists('giahhdvkct');
    }
}
