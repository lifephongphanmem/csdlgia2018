<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaGocVlXdCtDf extends Model
{
    protected $table = 'giagocvlxdctdf';
    protected $fillable = [
        'id',
        'district',
        'tenhhdv',
        'qccl',
        'dvt',
        'giagoc',
        'qcad',
        'ghichu',
    ];
}
