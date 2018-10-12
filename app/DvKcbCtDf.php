<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DvKcbCtDf extends Model
{
    protected $table = 'dvkcbctdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'madv',
        'manhom',
        'magoc',
        'capdo',
        'tendichvu',
        'dvt',
        'gc',
        'sapxep',
        'giadv',
    ];
}
