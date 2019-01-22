<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CungCapGiaCtDf extends Model
{
    protected $table = 'cungcapgiactdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahanghoa',
        'tenhanghoa',
        'thongsokt',
        'xuatxu',
        'dvt',
        'gia',
        'ghichu',
    ];
}
