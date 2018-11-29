<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgayNghiLe extends Model
{
    protected $table = 'ngaynghile';
    protected $fillable = [
        'id',
        'mota',
        'tungay',
        'denngay'
    ];
}
