<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkmhbogctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkmhbogct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa',30)->nullable();
            $table->string('mahuyen',30)->nullable();
            $table->string('mahs',30)->nullable();
            $table->string('tenhh')->nullable();
            $table->text('quycach')->nullable();
            $table->string('dvt',10)->nullable();
            $table->string('plhh')->nullable();
            $table->string('gialk',10)->nullable();
            $table->string('giakk',10)->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai',10)->nullable();
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
        Schema::dropIfExists('kkmhbogct');
    }
}
