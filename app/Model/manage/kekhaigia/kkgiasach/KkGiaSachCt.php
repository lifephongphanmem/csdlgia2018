<?php

namespace App\Model\manage\kekhaigia\kkgiasach;

use Illuminate\Database\Eloquent\Model;

class KkGiaSachCt extends Model
{
    protected $table = 'kkgiasachct';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'tthhdv',
        'qccl',
        'dvt',
        'dongialk',
        'dongia',
        'ghichu',
        'thuevat',
        'trangthai',
    ];
}
