<?php

namespace App\Model\manage\kekhaigia\kkgiaxmtxd;

use Illuminate\Database\Eloquent\Model;

class KkGiaXmTxd extends Model
{
    protected $table = 'kkgiaxmtxd';
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
