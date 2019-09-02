<?php

namespace App\Model\manage\kekhaigia\kkgiasach;

use Illuminate\Database\Eloquent\Model;

class KkGiaSachCtDf extends Model
{
    protected $table = 'kkgiasachctdf';
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
