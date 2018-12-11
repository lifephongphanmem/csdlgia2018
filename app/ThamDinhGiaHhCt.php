<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaHhCt extends Model
{
    protected $table = 'thamdinhgiahhct';
    protected $fillable = [
        'id',
        'manhom',
        'nhomhh',
        'tenhh',
        'qccl',
        'dvt',
        'sl',
        'nguyengiadenghi',
        'giadenghi',
        'nguyengiathamdinh',
        'giaththamdinh',
        'giakththamdinh',
        'giatritstd',
        'gc',
        'mahs'
    ];
}
