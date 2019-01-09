<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhlytaisanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhlytaisan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('soqd')->nullable();
            $table->date('ngayqd')->nullable();
            $table->string('tents')->nullable();
            $table->string('thongsoqd')->nullable();
            $table->string('nhanhieu')->nullable();
            $table->string('sokhung')->nullable();
            $table->string('somay')->nullable();
            $table->string('namsx')->nullable();
            $table->string('nuocsx')->nullable();
            $table->string('nguyengia')->nullable();
            $table->date('thoidiemhm')->nullable();
            $table->string('phantramhm')->nullable();

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
        Schema::dropIfExists('thanhlytaisan');
    }
}
