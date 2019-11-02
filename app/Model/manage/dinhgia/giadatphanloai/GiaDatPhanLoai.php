<?php

namespace App\Model\manage\dinhgia\giadatphanloai;

use Illuminate\Database\Eloquent\Model;

class GiaDatPhanLoai extends Model
{
    protected $table = 'giadatphanloai';
    protected $fillable = [
        'id',
        'mahs',
        'mahuyen',
        'maxa',
        'mavitri',
        'tenphanloai',
        'thoidiem',
        'soqd',
        'trangthai',
        'congbo',
        'thaotac',
        'ghichu',
    ];
}
