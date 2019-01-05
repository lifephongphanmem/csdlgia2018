<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmvlxdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmvlxd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tennhom')->nullable();
            $table->string('ten')->nullable();
            $table->string('level')->nullable();//(CT or Nhom)
            $table->string('theodoi')->nullable();
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
        Schema::dropIfExists('dmvlxd');
    }
}
