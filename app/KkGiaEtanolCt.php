<?php

namespace App;

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
