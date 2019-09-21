<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGianuocshctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gianuocshct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madoituong')->nullable();
            $table->string('doituongsd')->nullable();
            $table->string('giachuathue')->nullable();
            $table->string('thuevat')->nullable();
            $table->string('giacothue')->nullable();
            $table->string('phibvmttyle')->nullable();
            $table->string('phibvmt')->nullable();
            $table->string('thanhtien')->nullable();
            $table->string('mahs')->nullable();
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
        Schema::dropIfExists('gianuocshct');
    }
}
