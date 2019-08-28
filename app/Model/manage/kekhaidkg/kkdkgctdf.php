<?php

namespace App\Model\manage\kekhaidkg;

use Illuminate\Database\Eloquent\Model;

class kkdkgctdf extends Model
{
    protected $table = 'kkdkgctdf';
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
    ];
}
