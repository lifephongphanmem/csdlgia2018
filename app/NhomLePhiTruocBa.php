<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomLePhiTruocBa extends Model
{
    protected $table = 'nhomlephitruocba';
    protected $fillable = [
        'id',
        'manhom',
        'nhomxe',
    ];
}
