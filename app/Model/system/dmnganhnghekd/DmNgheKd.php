<?php

namespace App\Model\system\dmnganhnghekd;

use Illuminate\Database\Eloquent\Model;

class DmNgheKd extends Model
{
    protected $table = 'dmnghekd';
    protected $fillable = [
        'id',
        'manganh',
        'manghe',
        'tennghe',
        'mahuyen',
        'theodoi',
        'congbo',
        'phanloai',
    ];
}
