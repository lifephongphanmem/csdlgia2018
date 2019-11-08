<?php

namespace App\Model\manage\kekhaigia\kkdvlt;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvLtCt extends Model
{
    protected $table = 'kkgiadvltct';
    protected $fillable = [
        'id',
        'mahs',
        'macskd',
        'tenhhdv',
        'qccl',
        'dvt',
        'mucgialk',
        'mucgiakk',
        'trangthai',
        'ghichu',
    ];
}
