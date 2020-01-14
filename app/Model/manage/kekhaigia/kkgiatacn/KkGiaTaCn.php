<?php

namespace App\Model\manage\kekhaigia\kkgiatacn;

use Illuminate\Database\Eloquent\Model;

class KkGiaTaCn extends Model
{
    protected $table = 'kkgiatacn';
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
        'nguoinop',
        'dtll',
        'email',
        'fax',
        'ngaynhan',
        'sohsnhan',
        'ghichu',
        'ptnguyennhan',
        'chinhsachkm',
        'ghichu',
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'thoihan',
        'congbo',
    ];
}
