<?php

namespace App\Model\manage\kekhaigia\kkgiathan;

use Illuminate\Database\Eloquent\Model;

class KkGiaThanCt extends Model
{
    protected $table = 'kkgiathanct';
    protected $fillable = [
        'id',
        'mahs',
        'tthhdv',
        'qccl',
        'dvt',
        'dongialk',
        'dongia',
        'ghichu',
        'thuevat',
    ];
}