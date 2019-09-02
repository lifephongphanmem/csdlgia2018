<?php

namespace App\Model\manage\kekhaigia\kkgiaetanol;

use Illuminate\Database\Eloquent\Model;

class KkGiaEtanolCt extends Model
{
    protected $table = 'kkgiaetanolct';
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
