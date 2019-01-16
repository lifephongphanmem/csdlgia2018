<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHangHoa extends Model
{
    protected $table = 'giahanghoa';
    protected $fillable = [
        'id',
        'ngaynhap',
        'maxa',
        'mahuyen',
        'mahs',
        'manhom',
        'trangthai',
        'congbo',
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
    ];
}
