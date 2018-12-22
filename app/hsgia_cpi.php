<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hsgia_cpi extends Model
{
    protected $table = 'hsgia_cpi';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'tgnhap',
        'noidung',
        'nam',
        'thang',
        'maxa',
        'mahuyen',
        'district',
        'trangthai'
    ];
}
