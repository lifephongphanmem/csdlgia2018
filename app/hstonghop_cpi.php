<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hstonghop_cpi extends Model
{
    protected $table = 'hstonghop_cpi';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'tgnhap',
        'nam',
        'thang',
        'noidung',

        'ttnguoinop',
        'ngaynhan',
        'sohsnhan',
        'ngaychuyen',
        'lydo',

        'trangthai',
        'district',
        'maxa',
        'mahuyen'
    ];
}
