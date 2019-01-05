<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kkdkg extends Model
{
    protected $table = 'kkdkg';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'theoqd',
        'ngaynhap',
        'socv',
        'socvlk',
        'ngaycvlk',
        'ngayhieuluc',
        'ttnguoinop',
        'ngaynhan',
        'sohsnhan',
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'thoihan',
        'phanloai',
        'ghichu',
    ];
}
