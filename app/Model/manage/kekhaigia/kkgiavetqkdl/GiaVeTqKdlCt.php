<?php

namespace App\Model\manage\kekhaigia\kkgiavetqkdl;

use Illuminate\Database\Eloquent\Model;

class GiaVeTqKdlCt extends Model
{
    protected $table = 'giavetqkdlct';
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
