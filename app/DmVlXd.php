<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmVlXd extends Model
{
    protected $table = 'dmvlxd';
    protected $fillable = [
        'id',
        'tennhom',
        'ten',
        'level',
        'theodoi'
    ];
}
