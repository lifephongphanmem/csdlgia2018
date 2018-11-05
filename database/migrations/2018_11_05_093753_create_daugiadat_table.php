<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soqd')->nullable();
            $table->string('diadiem')->nullable();
            $table->string('donvi')->nullable();
            $table->string('tgdaugia')->nullable();
            $table->string('tgddbanhsdaugia')->nullable();
            $table->text('dkdaugia')->nullable();
            $table->text('htdaugia')->nullable();
            $table->string('thdaugia')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('mahs')->nullable();
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
        Schema::dropIfExists('daugiadat');
    }
}
