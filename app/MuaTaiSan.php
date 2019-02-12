<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuaTaiSan extends Model
{
    protected $table = 'muataisan';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'thongtinhs',
        'ngaynhap',
        'ngayapdung',
        'ghichu',
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
        'congbo',
    ];
}
