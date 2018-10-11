<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyen extends Model
{
    protected $table = 'thuetainguyen';
    protected $fillable = [
        'id',
        'mahs',
        'ngayapdung',
        'maxa',
        'mahuyen',
        'district',
        'soqd',
        'ghichu',
        'manhom',
        'trangthai',
    ];
}
