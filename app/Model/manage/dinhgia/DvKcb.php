<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class DvKcb extends Model
{
    protected $table = 'dvkcb';
    protected $fillable = [
        'id',
        'thoidiem',
        'district',
        'tenbv',
        'mota',
        'dvt',
        'dongia',
        'trangthai',
        'ttqd',
        'ghichu',
    ];
}
