<?php

namespace App\Model\manage\kekhaidkg\kehaimhbog;

use Illuminate\Database\Eloquent\Model;

class KkMhBog extends Model
{
    protected $table = 'kkmhbog';
    protected $fillable = [
        'id',
        'congbo',
        'mahs',
        'maxa',
        'mahuyen',
        'theoqd',
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
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'pldn',
        'thoihan',
        'phanloai',
        'ghichu',
        'ptnguyennhan',
        'chinhsachkm',
    ];
}
