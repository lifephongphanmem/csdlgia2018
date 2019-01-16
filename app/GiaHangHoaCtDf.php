<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHangHoaCtDf extends Model
{
    protected $table = 'giahanghoactdf';
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
    ];
}
