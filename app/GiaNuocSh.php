<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaNuocSh extends Model
{
    protected $table = 'gianuocsh';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngayapdung',
        'ghichu',
        'trangthai',
    ];
}
