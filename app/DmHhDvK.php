<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmHhDvK extends Model
{
    protected $table = 'dmhhdvk';
    protected $fillable = [
        'id',
        'manhom',
        'nhom',
        'mahhdv',
        'tenhhdv',
        'dacdiemkt',
        'dvt',
        'xuatxu',
        'theodoi'
    ];
}
