<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CungCapGia extends Model
{
    protected $table = 'cungcapgia';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'ngaynhap',
        'ngayapdung',
        'ghichu',
        'lydo',
        'trangthai',
        'congbo',
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
    ];
}
