<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBcthvegiadmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcthvegiadm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phanloai')->nullable();
            $table->text('mota')->nullable();
            $table->string('theodoi')->nullable();
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
        Schema::dropIfExists('bcthvegiadm');
    }
}
