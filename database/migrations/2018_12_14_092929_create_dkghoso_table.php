<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDkghosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dkghoso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa',30)->nullable();
            $table->string('mahuyen',30)->nullable();
            $table->string('mahs')->nullable();
            $table->string('soqd')->nullable();
            $table->string('socongvan')->nullable();
            $table->date('ngayquyetdinh')->nullable();
            $table->date('ngaythuchien')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('phanloaidkg')->nullable();
            $table->string('ttnguoichuyen')->nullable();
            $table->date('ngaychuyen')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('dkghoso');
    }
}
