<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiadattsctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugiadattsct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaidat')->nullable();
            $table->string('tenduong')->nullable();
            $table->string('loaiduong')->nullable();
            $table->string('vitri')->nullable();

            $table->string('qdgiadato')->nullable();
            $table->string('qdgiadattmdv')->nullable();
            $table->string('qdgiadatsxkd')->nullable();
            $table->string('qdgiadatnn')->nullable();
            $table->string('qdgiadatnuoits')->nullable();
            $table->string('qdgiadatmuoi')->nullable();

            $table->string('qdpddato')->nullable();
            $table->string('qdpddattmdv')->nullable();
            $table->string('qdpddatsxkd')->nullable();
            $table->string('qdpddatnn')->nullable();
            $table->string('qdpddatnuoits')->nullable();
            $table->string('qdpddatmuoi')->nullable();
            $table->string('qdpdgiatstd')->nullable();//

            $table->string('kqgiadaugiadat')->nullable();
            $table->string('kqgiadaugiats')->nullable();
            $table->string('kqgiadaugiadatts')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('dientichdat')->nullable();
            $table->string('dientichsanxd')->nullable();

//            $table->string('giakhoidiemdat')->nullable();
//            $table->string('giakhoidiemsanxd')->nullable();
//            $table->string('giadaugiadat')->nullable();
//            $table->string('giadaugiasanxd')->nullable();

            $table->string('mahs')->nullable();
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
        Schema::dropIfExists('daugiadattsct');
    }
}
