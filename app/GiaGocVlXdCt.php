<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaGocVlXdCt extends Model
{
    protected $table = 'giagocvlxdct';
    protected $fillable = [
        'id',
        'mahs',
        'tenhhdv',
        'qccl',
        'dvt',
        'giagoc',
        'qcad',
        'ghichu',
        'trangthai',
        'district',
    ];
}
