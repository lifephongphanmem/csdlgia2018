<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiavtxkctdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giavtxkctdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa')->nullable();
            $table->string('madichvu')->nullable();
            $table->string('loaixe')->nullable();
            $table->string('diemdau')->nullable();
            $table->string('diemcuoi')->nullable();
            $table->string('mota')->nullable();
            $table->string('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->string('sokm')->nullable();//mới

            $table->string('sltglk')->nullable();
            $table->string('chiphisxkdlk')->nullable();
            $table->string('chiphittlk')->nullable();
            $table->string('chiphinllk')->nullable();
            $table->string('chiphinclk')->nullable();
            $table->string('chiphikhlk')->nullable();
            $table->string('chiphisxkddtlk')->nullable();
            $table->string('chiphiclk')->nullable();
            $table->string('chiphisxclk')->nullable();
            $table->string('chiphitclk')->nullable();
            $table->string('chiphibhlk')->nullable();
            $table->string('chiphiqllk')->nullable();
            $table->string('tchiphisxkdlk')->nullable();
            $table->string('chiphidvklk')->nullable();
            $table->string('giathanhtblk')->nullable();
            $table->string('giathanhlk')->nullable();

            $table->string('sltg')->nullable();
            $table->string('chiphisxkd')->nullable();
            $table->string('chiphitt')->nullable();
            $table->string('chiphinl')->nullable();
            $table->string('chiphinc')->nullable();
            $table->string('chiphikh')->nullable();
            $table->string('chiphisxkddt')->nullable();
            $table->string('chiphic')->nullable();
            $table->string('chiphisxc')->nullable();
            $table->string('chiphitc')->nullable();
            $table->string('chiphibh')->nullable();
            $table->string('chiphiql')->nullable();
            $table->string('tchiphisxkd')->nullable();
            $table->string('chiphidvk')->nullable();
            $table->string('giathanhtb')->nullable();
            $table->string('giathanh')->nullable();

            $table->text('giaitrinhctcp')->nullable();

            $table->string('giahllk')->nullable();
            $table->string('giahl')->nullable();

            $table->string('ghichu')->nullable();
            $table->string('thuevat')->nullable();
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
        Schema::dropIfExists('giavtxkctdf');
    }
}
