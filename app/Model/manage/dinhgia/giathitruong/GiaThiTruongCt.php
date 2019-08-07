<?php

namespace App\Model\manage\dinhgia\giathitruong;

use Illuminate\Database\Eloquent\Model;

class GiaThiTruongCt extends Model
{
    protected $table = 'giathitruongct';
    protected $fillable = [
        'id',
        'mahs',
        'manhom',
        'tennhom',
        'mahh',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'loaigia',
        'dongia',
        'nguontt',
        'ghichu',
        'trangthai',
    ];
}
