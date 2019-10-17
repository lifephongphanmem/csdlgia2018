<?php

namespace App\Model\manage\kekhaigia\kkgiavetqkdl;

use Illuminate\Database\Eloquent\Model;

class GiaVeTqKdl extends Model
{
    protected $table = 'giavetqkdl';
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
