<?php

namespace App\Model\manage\kekhaigia\kkgiay;

use Illuminate\Database\Eloquent\Model;

class KkGiaGiayCtDf extends Model
{
    protected $table = 'kkgiagiayctdf';
    protected $fillable = [
        'id',
        'maxa',
        'tthhdv',
        'qccl',
        'dvt',
        'dongialk',
        'dongia',
        'ghichu',
        'thuevat',
    ];
}
