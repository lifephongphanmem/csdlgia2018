<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThGiaGocVlXdCt extends Model
{
    protected $table = 'thgiagocvlxdct';
    protected $fillable = [
        'id',
        'mahs',
        'district',
        'tenhhdv',
        'qccl',
        'dvt',
        'giagoc',
        'qcad',
        'ghichu',
    ];
}
