<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaGocVlXd extends Model
{
    protected $table = 'giagocvlxd';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'quy',
        'nam',
        'ngaybc',
        'soqd',
        'mahs',
        'trangthai',
        'congbo',
        'ttthaotac',
    ];
}
