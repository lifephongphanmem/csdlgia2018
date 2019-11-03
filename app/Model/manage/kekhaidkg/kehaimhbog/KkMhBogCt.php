<?php

namespace App\Model\manage\kekhaidkg\kehaimhbog;

use Illuminate\Database\Eloquent\Model;

class KkMhBogCt extends Model
{
    protected $table = 'kkmhbogct';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahs',
        'tenhh',
        'quycach',
        'plhh',
        'dvt',
        'gialk',
        'giakk',
        'ghichu',
        'trangthai',
    ];
}
