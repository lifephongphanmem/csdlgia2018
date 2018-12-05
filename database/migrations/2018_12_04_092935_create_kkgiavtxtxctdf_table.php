<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkgiavtxtxctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkgiavtxtxctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('madichvu')->nullable();
            $table->string('loaixe')->nullable();
            $table->string('qccl')->nullable();
            $table->string('mota')->nullable();
            $table->string('dongialk')->nullable();
            $table->string('sllk')->nullable();
            $table->string('dvtlk')->nullable();
            $table->string('dongia')->nullable();
            $table->string('sl')->nullable();
            $table->string('dvt')->nullable();
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
        Schema::dropIfExists('kkgiavtxtxctdf');
    }
}
