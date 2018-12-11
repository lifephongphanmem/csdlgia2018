<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmctthamdinhgiahhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmctthamdinhgiahh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manhom')->nullable();
            $table->string('nhomhh')->nullable();
            $table->string('tenhh')->nullable();
            $table->string('qccl')->nullable();
            $table->string('dvt')->nullable();
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
        Schema::dropIfExists('dmctthamdinhgiahh');
    }
}
