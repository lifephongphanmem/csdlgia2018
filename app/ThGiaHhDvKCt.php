<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThGiaHhDvKCt extends Model
{
    protected $table = 'thgiahhdvkct';
    protected $fillable = [
        'id',
        'mahs',
        'ngaychotbc',
        'manhom',
        'mahhdv',
        'tenhhdv',
        'dacdiemkt',
        'xuatxu',
        'dvt',
        'gialk',
        'gia',
        'nguontt',
        'loaigia',
        'ghichu',
        'trangthai',
    ];
}
