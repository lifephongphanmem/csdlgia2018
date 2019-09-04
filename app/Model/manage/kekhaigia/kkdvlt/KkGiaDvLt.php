<?php

namespace App\Model\manage\kekhaigia\kkdvlt;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvLt extends Model
{
    protected $table = 'kkgiadvlt';
    protected $fillable = [
        'id',
        'mahs',
        'macskd',
        'maxa',
        'mahuyen',
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
        'dvt',
        'plhs',
        'thoihan',
    ];
}
