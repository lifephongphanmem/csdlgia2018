<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTsCong extends Model
{
    protected $table = 'giathuetscong';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'thongtinhs',
        'nam',
        'ghichu',
        'mahs',
        'trangthai',
    ];
}
