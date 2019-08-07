<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathitruongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathitruong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thang',2)->nullable();
            $table->string('nam',4)->nullable();
            $table->string('sobc')->nullable();
            $table->date('ngaybc')->nullable();
            $table->string('mahuyen',20)->nullable();
            $table->string('trangthai',10)->nullable();
            $table->string('mahs',20)->nullable();
            $table->string('matt',20)->nullable();
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
        Schema::dropIfExists('giathitruong');
    }
}
