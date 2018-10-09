<?php

namespace App;

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
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
