<?php

namespace App\Model\manage\kekhaigia\kkgiaxmtxd;

use Illuminate\Database\Eloquent\Model;

class KkGiaXmTxdCt extends Model
{
    protected $table = 'kkgiaxmtxdct';
    protected $fillable = [
        'id',
        'mahs',
        'qccl',
        'ten',
        'dvt',
        'gialk',
        'gia',
    ];
}
