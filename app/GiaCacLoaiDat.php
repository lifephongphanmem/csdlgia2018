<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaCacLoaiDat extends Model
{
    protected $table = 'giacacloaidat';
    protected $fillable = [
        'id',
        'maso',
        'magoc',
        'macapdo',
        'capdo',
        'vitri',
        'hienthi',
        'sapxep',
        'ngaynhap',
        'soqd',
        'giavt1',
        'giavt2',
        'giavt3',
        'giavt4',
        'ghichu',
        'mahuyen',
        'username',
        'thaotac',
    ];
}
