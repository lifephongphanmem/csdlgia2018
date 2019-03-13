<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmMhBinhOnGia extends Model
{
    protected $table = 'dmmhbinhongia';
    protected $fillable = [
        'id',
        'mamh',
        'tenmh',
        'hienthi',
        'phanloai',
        'dangkykekhai'
    ];
}
