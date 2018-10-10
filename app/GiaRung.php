<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaRung extends Model
{
    protected $table = 'giarung';
    protected $fillable = [
        'id',
        'mahs',
        'district',
        'soqd',
        'ngayapdung',
        'trangthai',
        'ghichu'
    ];
}
