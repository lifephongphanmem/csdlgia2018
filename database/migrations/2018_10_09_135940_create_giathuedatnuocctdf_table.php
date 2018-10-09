<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuedatnuocctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuedatnuocctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district')->nullable();
            $table->string('vitri')->nullable();
            $table->string('mota')->nullable();
            $table->string('dientich')->nullable();
            $table->string('dongia')->nullable();
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
        Schema::dropIfExists('giathuedatnuocctdf');
    }
}
