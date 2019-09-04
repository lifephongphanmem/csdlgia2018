<?php

namespace App\Model\manage\kekhaigia\kkdvvt\vchk;

use Illuminate\Database\Eloquent\Model;

class KkCuocVcHkCtDf extends Model
{
    protected $table = 'kkcuocvchkctdf';
    protected $fillable = [
        'id',
        'maxa',
        'tthhdv',
        'qccl',
        'dvt',
        'dongialk',
        'dongia',
        'ghichu',
        'thuevat',
    ];
}
