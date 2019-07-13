<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuenhactxdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuenhactxd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tents')->nullable();
            $table->string('dacdiempl')->nullable();
            $table->string('dacdiemktkt')->nullable();
            $table->string('diadiemtdgia')->nullable();
            $table->string('thoidiemtdg')->nullable();
            $table->string('phuongphaptdg')->nullable();
            $table->string('mucdichtdg')->nullable();
            $table->string('tendvyctdg')->nullable();
            $table->string('dientichchothue')->nullable();
            $table->string('giachothue')->nullable();
            $table->string('giatritstd')->nullable();
            $table->string('thoihantdg')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('giathuenhactxd');
    }
}
