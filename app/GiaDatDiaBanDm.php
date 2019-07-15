<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDatDiaBanDm extends Model
{
    protected $table = 'giadatdiabandm';
    protected $fillable = [
        'id',
        'maloaidat',
        'loaidat'
    ];
}
