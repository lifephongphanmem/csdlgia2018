<?php

namespace App\Model\manage\dinhgia\giadatdiaban;

use Illuminate\Database\Eloquent\Model;

class TtGiaDatDiaBan extends Model
{
    protected $table = 'ttgiadatdiaban';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngaybanhanh',
        'ngayapdung',
        'mota',
        'ipt1',
        'ipf1',
        'ghichu',
    ];
}
