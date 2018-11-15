<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmGiaThueMuaNhaXh extends Model
{
    protected $table = 'dmgiathuemuanhaxh';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
    ];
}
