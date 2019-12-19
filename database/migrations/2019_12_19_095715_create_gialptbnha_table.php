<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGialptbnhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gialptbnha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('soqd')->nullable();
            $table->date('ngaybh')->nullable();
            $table->date('ngayad')->nullable();
            $table->string('dvbh')->nullable();
            $table->text('ghichuxdm')->nullable();
            $table->text('ghichuclcl')->nullable();
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
        Schema::dropIfExists('gialptbnha');
    }
}
