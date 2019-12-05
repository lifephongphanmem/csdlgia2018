<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhDvK extends Model
{
    protected $table = 'giahhdvk';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'district',
        'matt',
        'ngayapdung',
        'soqd',
        'ghichu',
        'trangthai',
        'soqdlk',
        'ngayapdunglk',
        'phanloai',
        'thang',
        'nam',
        'congbo'
    ];
}
