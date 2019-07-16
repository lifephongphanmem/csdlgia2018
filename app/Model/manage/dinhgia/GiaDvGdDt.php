<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaDvGdDt extends Model
{
    protected $table = 'giadvgddt';
    protected $fillable = [
        'id',
        'nam',
        'diaban',
        'khuvuc',
        'mota',
        'dongia',
        'ttqd',
        'ghichu',
        'trangthai',
        'username',
        'trangthai'
    ];
}
