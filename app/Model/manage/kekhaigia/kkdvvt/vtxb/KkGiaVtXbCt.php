<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vtxb;

use Illuminate\Database\Eloquent\Model;

class KkGiaVtXbCt extends Model
{
    protected $table = 'kkgiavtxbct';
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
