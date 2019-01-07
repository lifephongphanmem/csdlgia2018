<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvHdTm extends Model
{
    protected $table = 'kkgiadvhdtm';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'thqd',
        'ngaynhap',
        'socv',
        'socvlk',
        'ngaycvlk',
        'ngayhieuluc',
        'ttnguoinop',
        'ngaynhan',
        'sohsnhan',
        'ghichu',
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'thoihan',
    ];
}
