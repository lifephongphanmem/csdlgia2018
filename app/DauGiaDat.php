<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGiaDat extends Model
{
    protected $table = 'daugiadat';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'diadiem',
        'donvi',
        'tgdaugia',
        'tgddbanhsdaugia',
        'dkdaugia',
        'htdaugia',
        'thdaugia',
        'ghichu',
        'trangthai',
        'district',
        'maxa',
        'mahuyen',

    ];
}
