<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dmhanghoa_cpi extends Model
{
    protected $table = 'dmhanghoa_cpi';
    protected $fillable = [
        'id',
        'mahh',
        'magoc',
        'macapdo',
        'capdo',
        'quyenso',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'ghichu',
        'sapxep',
        'theodoi',
    ];
}
