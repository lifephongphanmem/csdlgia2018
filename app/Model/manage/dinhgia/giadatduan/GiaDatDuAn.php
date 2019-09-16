<?php

namespace App\Model\manage\dinhgia\giadatduan;

use Illuminate\Database\Eloquent\Model;

class GiaDatDuAn extends Model
{
    protected $table = 'giadatduan';
    protected $fillable = [
        'id',
        'mahuyen',
        'maxa',
        'tenduan',
        'thoidiem',
        'dientich',
        'soqd',
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

        'manhomduan',
        'trangthai',
        'thaotac',
        'ghichu',
    ];
}
