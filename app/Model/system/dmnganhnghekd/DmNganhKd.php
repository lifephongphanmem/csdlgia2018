<?php

namespace App\Model\system\dmnganhnghekd;

use Illuminate\Database\Eloquent\Model;

class DmNganhKd extends Model
{
    protected $table = 'dmnganhkd';
    protected $fillable = [
        'id',
        'manganh',
        'tennganh',
        'theodoi',
        'congbo',
    ];
}
