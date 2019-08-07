<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiarungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giarung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district',20)->nullable();
            $table->string('manhom',20)->nullable();
            $table->text('tenduan')->nullable();
            $table->text('mota')->nullable();
            $table->string('dientich')->nullable();
            $table->double('dongia')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('ttqd')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai',20)->nullable();
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
        Schema::dropIfExists('giarung');
    }
}
