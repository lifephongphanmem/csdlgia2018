<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vtxk;

use Illuminate\Database\Eloquent\Model;

class GiaVtXk extends Model
{
    protected $table = 'giavtxk';
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
    ];
}
