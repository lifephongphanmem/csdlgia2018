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
        'giadat',
        'ghichu',
        'mahuyen',
        'username',
        'thaotac',
    ];
}
