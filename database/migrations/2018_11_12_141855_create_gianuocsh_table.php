<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGianuocshTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gianuocsh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soqd')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('diaban')->nullable();
            $table->string('doituong')->nullable();
            $table->string('mota')->nullable();
            $table->string('giachuathue')->nullable();
            $table->string('thuevat')->nullable();
            $table->string('giacothue')->nullable();
            $table->string('phibvmttyle')->nullable();
            $table->string('phibvmt')->nullable();
            $table->string('thanhtien')->nullable();
            $table->string('dvt')->nullable();
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
        Schema::dropIfExists('gianuocsh');
    }
}
