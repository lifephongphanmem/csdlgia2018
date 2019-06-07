<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmGiaDatDuAn extends Model
{
    protected $table = 'dmgiadatduan';
    protected $fillable = [
        'id',
        'manhomduan',
        'tennhomduan',
    ];
}
