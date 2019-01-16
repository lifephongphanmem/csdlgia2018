<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmNhomHangHoa extends Model
{
    protected $table = 'dmnhomhanghoa';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi',
    ];
}
