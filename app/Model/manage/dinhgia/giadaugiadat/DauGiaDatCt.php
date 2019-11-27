<?php

namespace App\Model\manage\dinhgia\giadaugiadat;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatCt extends Model
{
    protected $table = 'daugiadatct';
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

        'kqdgdato',
        'kqdgdattmdv',
        'kqdgdatsxkd',
        'kqdgdatnn',
        'kqdgdatnuoits',
        'kqdgdatmuoi',
        'dientich',

//        'giakhoidiem',
//        'giadaugia',
    ];
}
