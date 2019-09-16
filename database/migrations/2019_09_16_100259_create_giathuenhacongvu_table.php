<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuenhacongvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuenhacongvu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district')->nullable();
            $table->string('manhom')->nullable();
            $table->string('tenduan')->nullable();
            $table->string('mota')->nullable();
            $table->string('dientich')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dongiathue')->nullable();
            $table->string('thoidiemkc')->nullable();
            $table->string('thoidiemht')->nullable();
            $table->string('ttqd')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::dropIfExists('giathuenhacongvu');
    }
}
