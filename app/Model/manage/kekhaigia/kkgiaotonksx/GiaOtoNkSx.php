<?php

namespace App\Model\manage\kekhaigia\kkgiaotonksx;

use Illuminate\Database\Eloquent\Model;

class GiaOtoNkSx extends Model
{
    protected $table = 'giaotonksx';
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
