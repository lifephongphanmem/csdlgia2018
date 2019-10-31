<?php

namespace App\Model\manage\kekhaigia\kkgiaxemaynksx;

use Illuminate\Database\Eloquent\Model;

class GiaXeMayNkSxCt extends Model
{
    protected $table = 'giaxemaynksxct';
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
        'trangthai'
    ];
}
