<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vtxb;

use Illuminate\Database\Eloquent\Model;

class KkGiaVtXb extends Model
{
    protected $table = 'kkgiavtxb';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahs',
        'ngaynhap',
        'ngayhieuluc',
        'socv',
        'socvlk',
        'ngaycvlk',
        'ytcauthanhgia',
        'thydggadgia',
        'ttnguoinop',
        'ngaynhan',
        'sohsnhan',
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'thoihan',
        'dvt',
        'congbo',
        'ghichu',
    ];
}
