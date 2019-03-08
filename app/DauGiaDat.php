<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGiaDat extends Model
{
    protected $table = 'daugiadat';
    protected $fillable = [
        'id',
        'mota',
        'totrinh',
        'ttqd',
        'ngaydaugia',
        'giadau',
        'ttkhtrung',
        'chenhlech',
        'mahs',
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
        'ghichu',
        'district',
        'maxa',
        'mahuyen',
        'ttthaotac'
    ];
}
