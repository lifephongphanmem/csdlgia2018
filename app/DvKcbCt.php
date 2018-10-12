<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DvKcbCt extends Model
{
    protected $table = 'dvkcbct';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'mahs',
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
