<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DvKcb extends Model
{
    protected $table = 'dvkcb';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'soqd',
        'ngayapdung',
        'trangthai',
        'mahs',
        'manhom',
        'ghichu',
    ];
}
