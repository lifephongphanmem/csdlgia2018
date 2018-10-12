<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomDvKcb extends Model
{
    protected $table = 'nhomdvkcb';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
