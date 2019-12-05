<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThgiahhdvkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thgiahhdvk', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngaybc')->nullable();
            $table->date('ngaychotbc')->nullable();
            $table->string('sobc')->nullable();
            $table->string('ttbc')->nullable();
            $table->string('manhom')->nullable();
            $table->string('mahs')->nullable();
            $table->string('phanloai')->nullable();//15 ngày đầu tháng, 15 ngày cuối tháng, tháng
            $table->string('thang')->nullable();
            $table->string('nam')->nullable();
            $table->text('ghichu')->nullable();
            $table->text('congbo')->nullable();
            $table->text('trangthai')->nullable();
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
        Schema::dropIfExists('thgiahhdvk');
    }
}
