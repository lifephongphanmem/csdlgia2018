<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaCtDf extends Model
{
    protected $table = 'thamdinhgiactdf';
    protected $fillable = [
        'id',
        'mats',
        'tents',
        'dacdiempl',
        'thongsokt',
        'nguongoc',
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
