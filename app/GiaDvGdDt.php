<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDvGdDt extends Model
{
    protected $table = 'giadvgddt';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'manhom',
        'ngayapdung',
        'ghichu',
        'trangthai'
    ];
}