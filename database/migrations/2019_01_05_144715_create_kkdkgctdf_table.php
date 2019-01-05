<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkdkgctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkdkgctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('mahs')->nullable();
            $table->string('tenhh')->nullable();
            $table->text('quycach')->nullable();
            $table->string('dvt')->nullable();
            $table->double('gialk')->nullable();
            $table->double  ('giakk')->nullable();
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('kkdkgctdf');
    }
}
