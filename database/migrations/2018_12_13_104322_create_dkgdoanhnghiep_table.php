<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDkgdoanhnghiepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dkgdoanhnghiep', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa',30)->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('tendn')->nullable();
            $table->string('diachi')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('giayphepkd')->nullable();
            $table->string('phanloaidn')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('username')->nullable();
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
        Schema::dropIfExists('dkgdoanhnghiep');
    }
}
