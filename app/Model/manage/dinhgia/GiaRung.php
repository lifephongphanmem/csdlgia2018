<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaRung extends Model
{
    protected $table = 'giarung';
    protected $fillable = [
        'id',
        'district',
        'manhom',
        'tenduan',
        'mota',
        'dientich',
        'dongia',
        'thoidiem',
        'ttqd',
        'ghichu',
        'trangthai'
    ];
}
