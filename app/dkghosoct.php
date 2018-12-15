<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dkghosoct extends Model
{
    protected $table = 'dkghosoct';
    protected $fillable = [
        'id',
        'mahs',
        'tenhhdv',
        'quycach',
        'donvitinh',
        'mucgiahienhanh',
        'mucgiamoi',
    ];
}
