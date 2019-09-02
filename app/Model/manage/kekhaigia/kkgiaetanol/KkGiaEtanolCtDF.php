<?php

namespace App\Model\manage\kekhaigia\kkgiaetanol;

use Illuminate\Database\Eloquent\Model;

class KkGiaEtanolCtDF extends Model
{
    protected $table = 'kkgiaetanolctdf';
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
