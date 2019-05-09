<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGianuocshTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gianuocsh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soqd')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('mahs')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::dropIfExists('gianuocsh');
    }
}
