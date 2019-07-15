<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiadatdiabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadatdiaban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nam')->nullable();
            $table->string('maloaidat')->nullable();
            $table->string('khuvuc')->nullable();
            $table->text('mota')->nullable();
            $table->string('mdsd')->nullable();
            $table->double('giavt1')->default(0);
            $table->double('giavt2')->default(0);
            $table->double('giavt3')->default(0);
            $table->double('giavt4')->default(0);
            $table->double('giavt5')->default(0);
            $table->double('hesok')->default(1);
            $table->string('district')->nullable();//cho trường hợp huyện nào nhập giá của huyện đó
            $table->string('soqd')->nullable();
            $table->string('username')->nullable();
            $table->string('thaotac')->nullable();
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
        Schema::dropIfExists('giadatdiaban');
    }
}
