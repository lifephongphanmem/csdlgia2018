<?php

namespace App\Model\manage\kekhaigia\kkgiay;

use Illuminate\Database\Eloquent\Model;

class KkGiaGiayCt extends Model
{
    protected $table = 'kkgiagiayct';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'tthhdv',
        'qccl',
        'dvt',
        'dongialk',
        'dongia',
        'ghichu',
        'thuevat',
        'trangthai',
    ];
}
