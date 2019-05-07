<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiacacloaidathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giacacloaidath', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maso')->nullable();
            $table->string('magoc')->nullable();//mã số vị trí quản lý (mã cha)
            $table->string('macapdo')->nullable();
            $table->string('capdo')->nullable();//
            $table->text('vitri')->nullable();
            $table->text('hienthi')->nullable();//hiển thị số thứ tự trên báo cáo
            $table->date('ngaynhap')->nullable();
            $table->string('soqd')->nullable();
            $table->double('giavt1')->default(0);
            $table->double('giavt2')->default(0);
            $table->double('giavt3')->default(0);
            $table->double('giavt4')->default(0);
            $table->double('hesok')->default(1);
            $table->string('sapxep')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('mahuyen')->nullable();//cho trường hợp huyện nào nhập giá của huyện đó
            $table->string('username')->nullable();
            $table->string('thaotac')->nullable();
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
        Schema::dropIfExists('giacacloaidath');
    }
}
