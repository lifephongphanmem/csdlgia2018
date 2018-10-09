<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhOnGiaCtDf extends Model
{
    protected $table = 'binhongiactdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'tenhh',
        'giatoithieu',
        'giatoida',
        'thapdung',
        'ghichu'
    ];
}
