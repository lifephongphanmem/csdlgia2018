<?php

namespace App;

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
