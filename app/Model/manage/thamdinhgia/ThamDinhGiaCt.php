<?php

namespace App\Model\manage\thamdinhgia;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGiaCt extends Model
{
    protected $table = 'thamdinhgiact';
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
        'mahs',
        'trangthai'
    ];
}
