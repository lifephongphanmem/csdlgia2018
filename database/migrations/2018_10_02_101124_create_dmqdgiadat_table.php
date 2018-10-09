<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmqdgiadatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmqdgiadat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soquyetdinh')->nullable();
            $table->string('sohieu')->nullable();
            $table->text('mota')->nullable();
            $table->date('ngayquyetdinh')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('dmqdgiadat');
    }
}
