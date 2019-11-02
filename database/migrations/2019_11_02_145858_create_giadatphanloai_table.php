<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadatphanloaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadatphanloai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mavitri')->nullable();
            $table->string('tenphanloai')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('soqd')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('congbo')->nullable()->default('CHUACONGBO');
            $table->string('thaotac')->nullable();
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('giadatphanloai');
    }
}
