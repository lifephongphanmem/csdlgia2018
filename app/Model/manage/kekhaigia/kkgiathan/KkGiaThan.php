<?php

namespace App\Model\manage\kekhaigia\kkgiathan;

use Illuminate\Database\Eloquent\Model;

class KkGiaThan extends Model
{
    protected $table = 'kkgiathan';
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
        'nguoinop',
        'dtll',
        'email',
        'fax',
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
        'ptnguyennhan',
        'chinhsachkm',
    ];
}
