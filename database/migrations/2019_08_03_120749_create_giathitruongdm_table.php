<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathitruongdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathitruongdm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matt')->nullable();
            $table->string('manhom',20)->nullable();
            $table->string('tennhom')->nullable();
            $table->string('mahh',20)->nullable();
            $table->string('tenhh')->nullable();
            $table->text('dacdiemkt')->nullable();
            $table->string('dvt')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::dropIfExists('giathitruongdm');
    }
}
