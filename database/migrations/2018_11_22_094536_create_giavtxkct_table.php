<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiavtxkctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giavtxkct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahs')->nullable();
            $table->string('maxa')->nullable();
            $table->string('tendvcu')->nullable();
            $table->string('qccl')->nullable();
            $table->string('dvt')->nullable();
            $table->string('gialk')->nullable();
            $table->string('giakk')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('trangthai')->nullable();



            $table->string('dvcu')->nullable();

            $table->string('sltgdvt')->nullable();
            $table->string('sltgtt')->nullable();
            $table->string('sltggc')->nullable();

            $table->string('chiphinldvt')->nullable();
            $table->string('chiphinltt')->nullable();
            $table->string('chiphinlgc')->nullable();

            $table->string('chiphincdvt')->nullable();
            $table->string('chiphinctt')->nullable();
            $table->string('chiphincgc')->nullable();

            $table->string('chiphikhdvt')->nullable();
            $table->string('chiphikhtt')->nullable();
            $table->string('chiphikhdv')->nullable();

            $table->string('chiphisxkddtdvt')->nullable();
            $table->string('chiphisxkddttt')->nullable();
            $table->string('chiphisxkddtgc')->nullable();

            $table->string('chiphisxcdvt')->nullable();
            $table->string('chiphisxctt')->nullable();
            $table->string('chiphisxcgc')->nullable();

            $table->string('chiphitcdvt')->nullable();
            $table->string('chiphitctt')->nullable();
            $table->string('chiphitcgc')->nullable();

            $table->string('chiphibhdvt')->nullable();
            $table->string('chiphibhtt')->nullable();
            $table->string('chiphibhgc')->nullable();

            $table->string('chiphiqldvt')->nullable();
            $table->string('chiphiqltt')->nullable();
            $table->string('chiphiqlgc')->nullable();

            $table->string('chiphidvkdvt')->nullable();
            $table->string('chiphidvktt')->nullable();
            $table->string('chiphidvkgc')->nullable();

            $table->text('giaitrinhctcp')->nullable();

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
        Schema::dropIfExists('giavtxkct');
    }
}
