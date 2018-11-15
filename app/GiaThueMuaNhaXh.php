<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueMuaNhaXh extends Model
{
    protected $table = 'giathuemuanhaxh';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngayapdung',
        'trangthai',
        'manhom',
        'ghichu',
    ];
}
