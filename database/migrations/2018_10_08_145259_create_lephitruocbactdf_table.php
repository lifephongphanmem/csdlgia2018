<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLephitruocbactdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lephitruocbactdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->nullable();
            $table->string('manhom')->nullable();
            $table->string('nhanhieu')->nullabe();
            $table->string('tentm')->nullable();
            $table->string('ttlv')->nullable();
            $table->string('socho')->nullable();
            $table->string('giatinhlptb')->nullable();
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
        Schema::dropIfExists('lephitruocbactdf');
    }
}
