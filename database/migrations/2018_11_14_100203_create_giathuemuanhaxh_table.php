<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiathuemuanhaxhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuemuanhaxh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district',20)->nullable();
            $table->text('tenduan')->nullable();
            $table->text('mota')->nullable();
            $table->string('dientich')->nullable();
            $table->string('dvt',20)->nullable();
            $table->double('dongiathue')->nullable();
            $table->double('dongiathuemua')->nullable();
            $table->date('thoidiemkc')->nullable();
            $table->date('thoidiemht')->nullable();
            $table->string('ttqd')->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai',20)->nullable();
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
        Schema::dropIfExists('giathuemuanhaxh');
    }
}
