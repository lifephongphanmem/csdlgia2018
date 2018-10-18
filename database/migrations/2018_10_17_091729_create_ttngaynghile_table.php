<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTtngaynghileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttngaynghile', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngaytu')->nullable();
            $table->date('ngayden')->nullable();
            $table->string('mota')->nullable();
            $table->string('nam')->nullable();
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
        Schema::dropIfExists('ttngaynghile');
    }
}
