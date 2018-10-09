<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralConfigs extends Model
{
    protected $table = 'general-configs';
    protected $fillable = [
        'id',
        'maqhns',
        'tendonvi',
        'diachi',
        'tel',
        'thutruong',
        'ketoan',
        'nguoilapbieu',
        'diadanh',
        'setting',
        'thongtinhd',
        'thoihanlt',
        'thoihanvt',
        'thoihangs',
        'thoihantacn'
    ];
}
