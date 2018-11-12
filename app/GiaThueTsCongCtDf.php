<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTsCongCtDf extends Model
{
    protected $table = 'giathuetscongctdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
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
