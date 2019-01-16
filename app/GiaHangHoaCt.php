<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHangHoaCt extends Model
{
    protected $table = 'giahanghoact';
    protected $fillable = [
        'id',
        'mahs',
        'mahanghoa',
        'tenhanghoa',
        'thongsokt',
        'xuatxu',
        'dvt',
        'gia',
    ];
}
