<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmGiaDvGdDt extends Model
{
    protected $table = 'dmgiadvgddt';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
    ];
}
