<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatCt extends Model
{
    protected $table = 'daugiadatct';
    protected $fillable = [
        'id',
        'mahs',
        'vitridiadiem',
        'mucgiasan',
        'mucgiadaugia',
        'donvidaugia',
    ];
}
