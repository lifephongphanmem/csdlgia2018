<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhOnGia extends Model
{
    protected $table = 'binhongia';
    protected $fillable = [
        'id',
        'ngayapdung',
        'gioapdung',
        'thapdung',
        'mamh',
        'mahs',
        'soqd',
        'trangthai',
        'ghichu'
    ];
}
