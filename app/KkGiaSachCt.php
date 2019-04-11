<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkGiaSachCt extends Model
{
    protected $table = 'kkgiasachct';
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
