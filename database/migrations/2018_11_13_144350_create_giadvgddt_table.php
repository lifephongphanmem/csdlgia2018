<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadvgddtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadvgddt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nam')->mullable();
            $table->string('district')->nullable();
            $table->string('khuvuc')->nullable();
            $table->string('mota')->nullable();
            $table->string('dongia')->nullable();
            $table->string('ttqd')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('username')->nullable();
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
        Schema::dropIfExists('giadvgddt');
    }
}
