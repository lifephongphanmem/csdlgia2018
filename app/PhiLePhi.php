<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhiLePhi extends Model
{
    protected $table = 'philephi';
    protected $fillable = [
        'id',
        'mahs',
        'mota',
        'soqd',
        'ngayapdung',
        'trangthai',
        'ghichu',
        'manhom',
        'dvt'
    ];
}
