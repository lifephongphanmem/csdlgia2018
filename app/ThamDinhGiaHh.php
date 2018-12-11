<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaHh extends Model
{
    protected $table = 'thamdinhgiahh';
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
        'filedk4',
        'manhom'
    ];
}
