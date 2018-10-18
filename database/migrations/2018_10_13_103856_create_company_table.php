<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa',30)->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('tendn')->nullable();
            $table->string('diachi')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('diadanh')->nullable();
            $table->string('chucdanh')->nullable();
            $table->string('nguoiky')->nullable();
            $table->string('noidknopthue')->nullable();
            $table->string('settingdvvt')->nullable();
            $table->double('vtxk')->default(0);
            $table->double('vtxb')->default(0);
            $table->double('vtxtx')->default(0);
            $table->double('vtch')->default(0);
            $table->string('ghichu')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('tailieu')->nullable();
            $table->string('giayphepkd')->nullable();
            $table->string('level')->nullable(); //Phân loại kd dịch vụ gì
            $table->string('avatar')->nullable();
            $table->string('pl')->nullable();
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
        Schema::dropIfExists('company');
    }
}
