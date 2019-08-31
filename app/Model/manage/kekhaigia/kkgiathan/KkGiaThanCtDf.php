<?php

namespace App\Model\manage\kekhaigia\kkgiathan;

use Illuminate\Database\Eloquent\Model;

class KkGiaThanCtDf extends Model
{
    protected $table = 'kkgiathanctdf';
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
