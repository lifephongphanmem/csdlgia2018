<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkgiavtxtxctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkgiavtxtxct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('madichvu')->nullable();
            $table->string('loaixe')->nullable();
            $table->text('mota')->nullable();
            $table->string('qccl')->nullable();
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
        Schema::dropIfExists('kkgiavtxtxct');
    }
}
