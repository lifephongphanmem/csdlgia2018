<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTsCongCt extends Model
{
    protected $table = 'giathuetscongct';
    protected $fillable = [
        'id',
        'mahs',
        'tents',
        'soluong',
        'dvt',
        'dongiathue',
        'dvthue',
        'hdthue',
        'ththue',
        'sotienthuenam',
    ];
}
