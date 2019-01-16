<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmHangHoa extends Model
{
    protected $table = 'dmhanghoa';
    protected $fillable = [
        'id',
        'manhom',
        'mahanghoa',
        'tenhanghoa',
        'thongsokt',
        'xuatxu',
        'dvt',
        'theodoi',
    ];
}
