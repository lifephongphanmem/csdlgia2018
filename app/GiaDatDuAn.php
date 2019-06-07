<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDatDuAn extends Model
{
    protected $table = 'giadatduan';
    protected $fillable = [
        'id',
        'mahuyen',
        'tenduan',
        'thoidiem',
        'dientich',
        'loaidat',
        'tenduong',
        'loaiduong',
        'vitri',

        'qddato',
        'qddatsxkd',
        'qddatnnkdc',
        'qddatnnnkdc',

        'tddato',
        'tddatsxkd',
        'tddatnnkdc',
        'tddatnnnkdc',

        'manhomduan',
        'trangthai',
        'thaotac',
    ];
}
