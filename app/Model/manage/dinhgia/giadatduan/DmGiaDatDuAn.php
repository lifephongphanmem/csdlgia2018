<?php

namespace App\Model\manage\dinhgia\giadatduan;

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
