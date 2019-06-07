<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadatduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadatduan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('tenduan')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('dientich')->nullable();
            $table->string('loaidat')->nullable();
            $table->string('tenduong')->nullable();
            $table->string('loaiduong')->nullable();
            $table->string('vitri')->nullable();

            $table->string('qddato')->nullable();
            $table->string('qddatsxkd')->nullable();
            $table->string('qddatnnkdc')->nullable();
            $table->string('qddatnnnkdc')->nullable();

            $table->string('tddato')->nullable();
            $table->string('tddatsxkd')->nullable();
            $table->string('tddatnnkdc')->nullable();
            $table->string('tddatnnnkdc')->nullable();

            $table->string('manhomduan')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('thaotac')->nullable();

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
        Schema::dropIfExists('giadatduan');
    }
}
