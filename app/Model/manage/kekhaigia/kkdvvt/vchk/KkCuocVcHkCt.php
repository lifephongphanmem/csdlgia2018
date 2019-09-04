<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vchk;

use Illuminate\Database\Eloquent\Model;

class KkCuocVcHkCt extends Model
{
    protected $table = 'kkcuocvchkct';
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
