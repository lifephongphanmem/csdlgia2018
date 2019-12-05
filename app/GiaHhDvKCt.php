<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhDvKCt extends Model
{
    protected $table = 'giahhdvkct';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'district',
        'manhom',
        'nhom',
        'mahhdv',
        'tenhhdv',
        'dacdiemkt',
        'dvt',
        'xuatxu',
        'gialk',
        'gia',
        'loaigia',
        'nguontt',
        'ghichu',
        'trangthai',
    ];
}
