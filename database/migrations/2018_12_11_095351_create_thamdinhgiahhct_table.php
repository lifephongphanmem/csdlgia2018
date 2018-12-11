<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamdinhgiahhctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamdinhgiahhct', function (Blueprint $table) {
            $table->increments('id');
            $table->text('manhom')->nullable();
            $table->text('nhomhh')->nullable();
            $table->text('tenhh')->nullable();
            $table->text('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->double('sl')->default(1);
            $table->double('nguyengiadenghi')->default(0);
            $table->double('giadenghi')->default(0);
            $table->double('nguyengiathamdinh')->default(0);
            $table->double('giatritstd')->default(0);
            $table->double('giaththamdinh')->default(0);
            $table->double('giakththamdinh')->default(0);
            $table->string('gc')->nullable();
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
        Schema::dropIfExists('thamdinhgiahhct');
    }
}
