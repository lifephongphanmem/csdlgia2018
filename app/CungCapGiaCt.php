<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CungCapGiaCt extends Model
{
    protected $table = 'cungcapgiact';
    protected $fillable = [
        'id',
        'mahs',
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
