<?php

namespace App\Model\manage\kekhaigia\kkdvlt;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvLtCt extends Model
{
    protected $table = 'kkgiadvltct';
    protected $fillable = [
        'id',
        'mahs',
        'loaip',
        'qccl',
        'sohieu',
        'ghichu',
        'mucgialk',
        'mucgialkct',
        'mucgiakk',
        'mucgiakkct',
        'tendoituong',
        'apdung',
        'madtad'
    ];
}
