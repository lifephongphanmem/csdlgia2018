<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkdkgctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkdkgct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maxa',30)->nullable();
            $table->string('mahuyen',30)->nullable();
            $table->string('mahs',30)->nullable();
            $table->string('tenhh')->nullable();
            $table->text('quycach')->nullable();
            $table->string('dvt',10)->nullable();
            $table->string('plhh')->nullable();
            $table->string('gialk',10)->nullable();
            $table->string('giakk',10)->nullable();
            $table->text('ghichu')->nullable();
            $table->string('trangthai',10)->nullable();

            //Nhập khẩu
            $table->string('nkdonvisxkd')->nullable();
            $table->text('nkqcpc')->nullable();

            $table->string('nksanluongdvt',10)->nullable();
            $table->double('nksanluongtt')->default(0);
            $table->string('nksanluonggc')->nullable();

            $table->string('nkgiamuackdvt',10)->nullable();
            $table->double('nkgiamuacktt')->default(0);
            $table->string('nkgiamuackgc')->nullable();

            $table->string('nkthuedvt',10)->nullable();
            $table->double('nkthuett')->default(0);
            $table->string('nkthueghichu')->nullable();

            $table->string('nkthuettdbdvt',10)->nullable();
            $table->double('nkthuettdbtt')->default(0);
            $table->string('nkthuettdbgc')->nullable();

            $table->string('nkthuephikdvt',10)->nullable();
            $table->double('nkthuephiktt')->default(0);
            $table->string('nkthuephikgc')->nullable();

            $table->string('nktienkdvt',10)->nullable();
            $table->double('nktienktt')->default(0);
            $table->string('nktienkgc')->nullable();

            $table->string('nkchiphitcdvt',10)->nullable();
            $table->double('nkchiphitctt')->default(0);
            $table->string('nkchiphitcgc')->nullable();

            $table->string('nkchiphibhdvt',10)->nullable();
            $table->double('nkchiphibhtt')->default(0);
            $table->string('nkchiphibhgc')->nullable();

            $table->string('nkchiphiqldvt',10)->nullable();
            $table->double('nkchiphiqltt')->default(0);
            $table->string('nkchiphiqlgc')->nullable();

            $table->string('nkgiathanh1spdvt',10)->nullable();
            $table->double('nkgiathanh1sptt')->default(0);
            $table->string('nkgiathanh1spgc')->nullable();

            $table->string('nkloinhuandkdvt',10)->nullable();
            $table->double('nkloinhuandktt')->default(0);
            $table->string('nkloinhuandkgc')->nullable();

            $table->string('nkthuegtgtkdvt',10)->nullable();
            $table->double('nkthuegtgtktt')->default(0);
            $table->string('nkthuegtgtkgc')->nullable();

            $table->string('nkgiabandkdvt',10)->nullable();
            $table->double('nkgiabandktt')->default(0);
            $table->string('nkgiabandkgc')->nullable();

            $table->text('nkgtgiamuack')->nullable();
            $table->text('nkgtthuenk')->nullable();
            $table->text('nkgtthuettdb')->nullable();
            $table->text('nkgtthuephik')->nullable();
            $table->text('nkgttienk')->nullable();
            $table->text('nkgtchiphitc')->nullable();
            $table->text('nkgtchiphibh')->nullable();
            $table->text('nkgtchiphiql')->nullable();
            $table->text('nkgtloinhuandk')->nullable();
            $table->text('nkgtthuegtgt')->nullable();
            $table->text('nkgtgiabandk')->nullable();

            //sẩn xuất trong nước
            $table->string('sxdonvisxkd')->nullable();
            $table->text('sxqcpc')->nullable();

            $table->string('sxchiphinvldvt',10)->nullable();
            $table->double('sxchiphinvlsl')->default(1);
            $table->double('sxchiphinvldg')->default(0);

            $table->string('sxchiphincdvt',10)->nullable();
            $table->double('sxchiphincsl')->default(1);
            $table->double('sxchiphincdg')->default(0);

            $table->string('sxchiphinvpxdvt',10)->nullable();
            $table->double('sxchiphinvpxsl')->default(1);
            $table->double('sxchiphinvpxdg')->default(0);

            $table->string('sxchiphivldvt',10)->nullable();
            $table->double('sxchiphivlsl')->default(0);
            $table->double('sxchiphivldg')->default(0);

            $table->string('sxchiphidcsxdvt',10)->nullable();
            $table->double('sxchiphidcsxsl')->default(1);
            $table->double('sxchiphidcsxdg')->default(0);

            $table->string('sxchiphikhtscddvt',10)->nullable();
            $table->double('sxchiphikhtscdsl')->default(1);
            $table->double('sxchiphikhtscddg')->default(0);

            $table->string('sxchiphidvmndvt',10)->nullable();
            $table->double('sxchiphidvmnsl')->default(1);
            $table->double('sxchiphidvmndg')->default(0);

            $table->string('sxchiphitienkdvt',10)->nullable();
            $table->double('sxchiphitienksl')->default(1);
            $table->double('sxchiphitienkdg')->default(0);

            $table->string('sxchiphibhdvt',10)->nullable();
            $table->double('sxchiphibhsl')->default(1);
            $table->double('sxchiphibhdg')->default(0);

            $table->string('sxchiphiqldndvt',10)->nullable();
            $table->double('sxchiphiqldnsl')->default(1);
            $table->double('sxchiphiqldndg')->default(0);

            $table->string('sxchiphitcdvt',10)->nullable();
            $table->double('sxchiphitcsl')->default(1);
            $table->double('sxchiphitcdg')->default(0);

            $table->string('sxloinhuandkdvt',10)->nullable();
            $table->double('sxloinhuandksl')->default(1);
            $table->double('sxloinhuandkdg')->default(0);

            $table->string('sxgiabanctdvt',10)->nullable();
            $table->double('sxgiabanctsl')->default(1);
            $table->double('sxgiabanctdg')->default(0);

            $table->string('sxthuettdbdvt',10)->nullable();
            $table->double('sxthuettdbsl')->default(1);
            $table->double('sxthuettdbdg')->default(0);

            $table->string('sxthuegtgtdvt',10)->nullable();
            $table->double('sxthuegtgtsl')->default(1);
            $table->double('sxthuegtgtdg')->default(0);

            $table->string('sxgiabandvt',10)->nullable();
            $table->double('sxgiabansl')->default(1);
            $table->double('sxgiabandg')->default(0);

            $table->text('sxgtchiphisx')->nullable();
            $table->text('sxgtchiphibh')->nullable();
            $table->text('sxgtchiphiqldn')->nullable();
            $table->text('sxgtchiphitc')->nullable();
            $table->text('sxgtloinhuandk')->nullable();
            $table->text('sxgtthuettdb')->nullable();
            $table->text('sxgtthuegtgt')->nullable();
            $table->text('sxgtgiaban')->nullable();

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
        Schema::dropIfExists('kkdkgct');
    }
}
