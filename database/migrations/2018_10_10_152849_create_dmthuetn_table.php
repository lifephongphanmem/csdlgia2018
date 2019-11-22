<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmthuetnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmthuetn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level')->nullable();
            $table->text('ten')->nullable();
            $table->string('manhom')->nullable();
            $table->string('cap1')->nullable();
            $table->string('cap2')->nullable();
            $table->string('cap3')->nullable();
            $table->string('cap4')->nullable();
            $table->string('cap5')->nullable();
            $table->string('dvt')->nullable();
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
        Schema::dropIfExists('dmthuetn');
    }
}
