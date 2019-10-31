<?php

namespace App\Model\manage\kekhaigia\kkgiadvcang;

use Illuminate\Database\Eloquent\Model;

class GiaDvCang extends Model
{
    protected $table = 'giadvcang';
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
