<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmGiaRung extends Model
{
    protected $table = 'dmgiarung';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
    ];
}
