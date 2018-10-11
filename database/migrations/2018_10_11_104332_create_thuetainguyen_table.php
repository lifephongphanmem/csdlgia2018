<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuetainguyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuetainguyen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('district')->nullable();
            $table->string('soqd')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('manhom')->nullable();
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
        Schema::dropIfExists('thuetainguyen');
    }
}
