<?php

namespace App\Model\manage\dinhgia\giagdbatdongsan;

use Illuminate\Database\Eloquent\Model;

class GiaGdBatDongSan extends Model
{
    protected $table = 'giagdbatdongsan';
    protected $fillable = [
        'mahs',
        'kyhieuvb',
        'dvbanhanh',
        'ngaybanhanh',
        'ngayapdung',
        'tieude',
        'ghichu',
        'maxa',
        'mahuyen',
        'ipt1',
        'ipf1',
        'trangthai',
    ];
}
