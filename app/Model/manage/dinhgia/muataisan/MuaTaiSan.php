<?php

namespace App\Model\manage\dinhgia\muataisan;

use Illuminate\Database\Eloquent\Model;

class MuaTaiSan extends Model
{
    protected $table = 'muataisan';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'manhom',
        'ngayqd',
        'thongtinqd',
        'soqd',
        'tennhathau',
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
