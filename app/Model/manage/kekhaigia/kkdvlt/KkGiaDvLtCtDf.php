<?php

namespace App\Model\manage\kekhaigia\kkdvlt;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvLtCtDf extends Model
{
    protected $table = 'kkgiadvltctdf';
    protected $fillable = [
        'id',
        'maxa',
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
