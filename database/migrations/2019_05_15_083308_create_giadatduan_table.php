<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadatduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadatduan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('tenduan')->nullable();
            $table->date('thoidiem')->nullable();
            $table->string('dientich')->nullable();
            $table->string('soqd')->nullable();
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

            $table->string('manhomduan')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('thaotac')->nullable();
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
        Schema::dropIfExists('giadatduan');
    }
}
