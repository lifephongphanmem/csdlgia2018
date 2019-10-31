<?php

namespace App\Model\manage\kekhaigia\kkgiaetanol;

use Illuminate\Database\Eloquent\Model;

class KkGiaEtanol extends Model
{
    protected $table = 'kkgiaetanol';
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
