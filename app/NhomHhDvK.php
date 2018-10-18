<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomHhDvK extends Model
{
    protected $table = 'nhomhhdvk';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
