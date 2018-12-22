<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hstonghop_cpi_chitiet extends Model
{
    protected $table = 'hstonghop_chitiet_cpi';
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
        'giahh',
        'chiso'
    ];
}
