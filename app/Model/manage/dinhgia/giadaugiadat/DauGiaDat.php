<?php

namespace App\Model\manage\dinhgia\giadaugiadat;

use Illuminate\Database\Eloquent\Model;

class DauGiaDat extends Model
{
    protected $table = 'daugiadat';
    protected $fillable = [
        'id',
        'mahuyen',
        'maxa',
        'tenduan',
        'thoidiem',
        'dientich',
        'soqdpagia',
        'soqddaugia',
        'soqdgiakhoidiem',
        'soqdkqdaugia',
        'mahs',
        'trangthai',
    ];
}
