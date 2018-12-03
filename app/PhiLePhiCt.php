<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhiLePhiCt extends Model
{
    protected $table = 'philephict';
    protected $fillable = [
        'id',
        'mahs',
        'ptcp',
        'mucthuphi',
        'ghichu'

    ];
}
