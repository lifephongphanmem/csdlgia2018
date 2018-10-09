<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhOnGiaCt extends Model
{
    protected $table = 'binhongiact';
    protected $fillable = [
        'id',
        'mahs',
        'tenhh',
        'giatoithieu',
        'giatoida',
        'thapdung',
        'ghichu'
    ];
}
