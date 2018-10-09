<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhongiactdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhongiactdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('giatoithieu')->nullable();
            $table->string('giatoida')->nullable();
            $table->string('thapdung')->nullable();
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('binhongiactdf');
    }
}
