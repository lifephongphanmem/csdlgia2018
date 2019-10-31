<?php

namespace App\Model\manage\kekhaigia\kkgiadvdlbb;

use Illuminate\Database\Eloquent\Model;

class GiaDvDlBbCt extends Model
{
    protected $table = 'giadvdlbbct';
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
