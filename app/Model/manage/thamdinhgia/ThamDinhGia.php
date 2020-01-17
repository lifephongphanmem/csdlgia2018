<?php

namespace App\Model\manage\thamdinhgia;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGia extends Model
{
    protected $table = 'thamdinhgia';
    protected $fillable = [
        'id',
        'diadiem',
        'thoidiem',
        'ppthamdinh',
        'mucdich',
        'dvyeucau',
        'thoihan',
        'sotbkl',
        'hosotdgia',
        'nguonvon',
        'trangthai',
        'quy',
        'mahuyen',
        'maxa',
        'mahs',
        'thuevat',
        'songaykq',
        'phanloai',
        'thuevat',
        'songaykq',
        'tttstd',
        'ghichu',
        'congbo',
        'thaotac',

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
