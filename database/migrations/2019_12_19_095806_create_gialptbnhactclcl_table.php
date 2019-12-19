<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGialptbnhactclclTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gialptbnhactclcl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('capnha')->nullable();
            $table->string('thoigiansd')->nullable();
            $table->string('tylehm')->nullable();
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
        Schema::dropIfExists('gialptbnhactclcl');
    }
}
