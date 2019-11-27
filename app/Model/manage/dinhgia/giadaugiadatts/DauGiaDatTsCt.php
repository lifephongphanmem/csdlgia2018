<?php

namespace App\Model\manage\dinhgia\giadaugiadatts;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatTsCt extends Model
{
    protected $table = 'daugiadattsct';
    protected $fillable = [
        'id',
        'mahs',
        'loaidat',
        'tenduong',
        'loaiduong',
        'vitri',

        'qdgiadato',
        'qdgiadattmdv',
        'qdgiadatsxkd',
        'qdgiadatnn',
        'qdgiadatnuoits',
        'qdgiadatmuoi',

        'qdpddato',
        'qdpddattmdv',
        'qdpddatsxkd',
        'qdpddatnn',
        'qdpddatnuoits',
        'qdpddatmuoi',
        'qdpdgiatstd', //

        'kqgiadaugiadat',
        'kqgiadaugiats',
        'kqgiadaugiadatts',
        'ghichu',
        'dientichdat',
        'dientichsanxd',

//        'giakhoidiemdat',
//        'giakhoidiemsanxd',
//        'giadaugiadat',
//        'giadaugiasanxd',
    ];
}
