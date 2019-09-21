<?php

namespace App\Model\manage\dinhgia\giadaugiadatts;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatTs extends Model
{
    protected $table = 'daugiadatts';
    protected $fillable = [
        'id',
        'mahuyen',
        'maxa',
        'tenduan',
        'thoidiem',
        'dientichdat',
        'dientichsanxd',
        'soqdpagia',
        'soqddaugia',
        'soqdgiakhoidiem',
        'soqdkqdaugia',
        'mahs',
        'trangthai',
    ];
}
