<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmDvKcb extends Model
{
    protected $table = 'dmdvkcb';
    protected $fillable = [
        'id',
        'madv',
        'manhom',
        'magoc',
        'capdo',
        'tendichvu',
        'dvt',
        'gc',
        'sapxep',
        'theodoi',
    ];
}
