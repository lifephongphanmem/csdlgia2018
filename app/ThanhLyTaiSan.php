<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhLyTaiSan extends Model
{
    protected $table = 'thanhlytaisan';
    protected $fillable = [
        'id',
        'mahs',
        'mahuyen',
        'maxa',
        'sohd',
        'ngayhd',
        'benban',
        'tents',
        'thongsokt',
        'giakhoidiem',
        'giaban',
        'ipt1',
        'ipf1',
        'ipt2',
        'ipf2',
        'ipt3',
        'ipf3',
        'ipt4',
        'ipf4',
        'ipt5',
        'ipf5',
        'trangthai',
        'ghichu'
    ];
}
