<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkGiaDvHdTmCtDf extends Model
{
    protected $table = 'kkgiadvhdtmctdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'qccl',
        'ten',
        'dvt',
        'gialk',
        'gia',
        'ghichu',
    ];
}
