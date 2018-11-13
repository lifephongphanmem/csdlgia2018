<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadvgddtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadvgddt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soqd')->nullable();
            $table->string('ngayapdung')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('mahs')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('manhom')->nullable();
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
        Schema::dropIfExists('giadvgddt');
    }
}
