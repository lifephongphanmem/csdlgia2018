<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaTaiSanCongDmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giataisancongdm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mataisan')->nullable();
            $table->string('tentaisan')->nullable();
            $table->string('dientich')->nullable();
            $table->string('dvt')->nullable();
            $table->string('mota')->nullable();
            $table->double('giatri')->default(0);
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
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
        Schema::dropIfExists('giataisancongdm');
    }
}
