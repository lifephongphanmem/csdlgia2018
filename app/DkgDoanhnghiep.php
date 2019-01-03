<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DkgDoanhnghiep extends Model
{
    protected $table = 'DkgDoanhnghiep';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'tendn',
        'diachi',
        'tel',
        'fax',
        'email',
        'ghichu',
        'giayphepkd',
        'phanloai',
        'phanloaidn',
        'username',
    ];
}
