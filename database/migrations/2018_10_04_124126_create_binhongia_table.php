<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhongiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhongia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngayapdung')->nullable();
            $table->time('gioapdung')->nullable();
            $table->string('thapdung')->nullable(); //Tối đa 6 tháng
            $table->string('mahs')->nullable();
            $table->string('mamh')->nullable();
            $table->string('soqd')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::dropIfExists('binhongia');
    }
}
