<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dkghoso extends Model
{
    protected $table = 'dkghoso';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahs',
        'soqd',
        'socongvan',
        'ngayquyetdinh',
        'ngaythuchien',
        'trangthai',
        'phanloai',
        'phanloaidkg',
        'ttnguoichuyen',
        'ngaychuyen',
        'ghichu',
    ];
}
