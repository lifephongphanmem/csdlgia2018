<?php

namespace App\Model\manage\dinhgia\thuetn;

use Illuminate\Database\Eloquent\Model;

class NhomThueTn extends Model
{
    protected $table = 'nhomthuetn';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
