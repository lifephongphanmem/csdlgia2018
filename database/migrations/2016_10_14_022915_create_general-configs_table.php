<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general-configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tendonvi')->nullable();
            $table->string('maqhns')->nullable();
            $table->string('diachi')->nullable();
            $table->string('tel')->nullable();
            $table->string('thutruong')->nullable();
            $table->string('ketoan')->nullable();
            $table->string('nguoilapbieu')->nullable();
            $table->string('diadanh')->nullable();
            $table->text('setting')->nullable();
            $table->text('thongtinhd')->nullable();
            $table->double('thoihanlt')->default(0);
            $table->double('thoihanvt')->default(0);
            $table->double('thoihangs')->default(0);
            $table->double('thoihantacn')->default(0);
            $table->double('sodvvt')->default(0); //không để vào bảng kê khai như DVLT dc do có 4 loại hình vận tải
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
        Schema::dropIfExists('general-configs');
    }
}
