<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hsgia_cpi_chitiet extends Model
{
    protected $table = 'hsgia_chitiet_cpi';
    protected $fillable = [
        'id',
        'mahs',
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
        'giatu',
        'giaden'
    ];
}
