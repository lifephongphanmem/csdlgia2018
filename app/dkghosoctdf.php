<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dkghosoctdf extends Model
{
    protected $table = 'dkghosoctdf';
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
