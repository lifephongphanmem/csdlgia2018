<?php

namespace App\Model\manage\kekhaidkg;

use Illuminate\Database\Eloquent\Model;

class kkdkgct extends Model
{
    protected $table = 'kkdkgct';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahs',
        'tenhh',
        'quycach',
        'dvt',
        'gialk',
        'giakk',
        'ghichu',
        'trangthai'
    ];
}
