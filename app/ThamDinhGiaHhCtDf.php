<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaHhCtDf extends Model
{
    protected $table = 'thamdinhgiahhctdf';
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
        'mahuyen',
        'maxa'
    ];
}
