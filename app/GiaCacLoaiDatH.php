<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaCacLoaiDatH extends Model
{
    protected $table = 'giacacloaidath';
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
        'hesok',
        'ghichu',
        'mahuyen',
        'username',
        'thaotac',
    ];
}
