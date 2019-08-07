<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathitruongttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathitruongtt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matt',20)->nullable();
            $table->string('ttqd')->nullable();
            $table->string('mota')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('theodoi',5)->nullable();
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
        Schema::dropIfExists('giathitruongtt');
    }
}
