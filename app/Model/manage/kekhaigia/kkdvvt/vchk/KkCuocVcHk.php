<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vchk;

use Illuminate\Database\Eloquent\Model;

class KkCuocVcHk extends Model
{
    protected $table = 'kkcuocvchk';
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
