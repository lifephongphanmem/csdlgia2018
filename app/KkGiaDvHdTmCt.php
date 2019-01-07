<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvHdTmCt extends Model
{
    protected $table = 'kkgiadvhdtmct';
    protected $fillable = [
        'id',
        'mahs',
        'qccl',
        'ten',
        'dvt',
        'gialk',
        'gia',
        'ghichu',
    ];
}
