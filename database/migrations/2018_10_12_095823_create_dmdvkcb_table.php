<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmdvkcbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmdvkcb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madv')->nullable();
            $table->string('manhom')->nullable();
            $table->string('magoc')->nullable();
            $table->string('capdo')->nullable();
            $table->string('tendichvu')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gc')->nullable();
            $table->string('sapxep')->nullable();
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
        Schema::dropIfExists('dmdvkcb');
    }
}
