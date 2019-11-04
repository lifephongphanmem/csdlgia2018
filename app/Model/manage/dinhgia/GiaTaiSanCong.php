<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaTaiSanCong extends Model
{
    protected $table = 'giataisancong';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'mataisan',
        'thongtinhs',
        'thoidiemtu',
        'thoidiemden',
        'giathue',
        'ghichu',
        'mahs',
        'soqd',
        'trangthai',
    ];
}
