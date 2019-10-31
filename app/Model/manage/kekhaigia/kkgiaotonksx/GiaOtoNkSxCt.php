<?php

namespace App\Model\manage\kekhaigia\kkgiaotonksx;

use Illuminate\Database\Eloquent\Model;

class GiaOtoNkSxCt extends Model
{
    protected $table = 'giaotonksxct';
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
