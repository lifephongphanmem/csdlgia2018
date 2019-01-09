<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhLyTaiSan extends Model
{
    protected $table = 'thanhlytaisan';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'soqd',
        'ngayqd',
        'tents',
        'thongsokt',
        'nhanhieu',
        'sokhung',
        'somay',
        'namsx',
        'nuocsx',
        'nguyengia',
        'thoidiemhm',
        'phantramhm',
        'ipt1',
        'ipf1',
        'trangthai',
        'lydo',
    ];
}
