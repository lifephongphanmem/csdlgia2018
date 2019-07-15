<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDatDiaBan extends Model
{
    protected $table = 'giadatdiaban';
    protected $fillable = [
        'id',
        'nam',
        'maloaidat',
        'khuvuc',
        'mota',
        'mdsd',
        'giavt1',
        'giavt2',
        'giavt3',
        'giavt4',
        'hesok',
        'ghichu',
        'district',
        'username',
        'thaotac',
        'soqd',
        'trangthai'
    ];
}
