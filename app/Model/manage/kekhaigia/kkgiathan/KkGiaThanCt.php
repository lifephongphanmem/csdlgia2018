<?php

namespace App\Model\manage\kekhaigia\kkgiathan;

use Illuminate\Database\Eloquent\Model;

class KkGiaThanCt extends Model
{
    protected $table = 'kkgiathanct';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'tenhhdv',
        'qccl',
        'dvt',
        'gialk',
        'gia',
        'ghichu',
        'thuevat',
        'trangthai',
    ];
}
