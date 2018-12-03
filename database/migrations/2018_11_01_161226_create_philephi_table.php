<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhilephiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('philephi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->text('mota')->nullable();
            $table->string('soqd')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('manhom')->nullable();
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
        Schema::dropIfExists('philephi');
    }
}
