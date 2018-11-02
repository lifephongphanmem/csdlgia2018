<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KkGsCt extends Model
{
    protected $table = 'kkgsct';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'mahs',
        'tenhh',
        'qccl',
        'dvt',
        'ghichu',

        'giaQlk',
        'giaClk',
        'giaCttlk',
        'giaCvtlk',
        'giaCnclk',
        'giaCkhlk',
        'giaCklk',
        'giaCclk',
        'giaCcmlk',
        'giaCtclk',
        'giaCbhlk',
        'giaCqllk',
        'giaTClk',
        'giaCPlk',
        'giaZlk',
        'giaZdvlk',

        'giaQ',
        'giaC',
        'giaCtt',
        'giaCvt',
        'giaCnc',
        'giaCkh',
        'giaCk',
        'giaCc',
        'giaCcm',
        'giaCtc',
        'giaCbh',
        'giaCql',
        'giaTC',
        'giaCP',
        'giaZ',
        'giaZdv',
    ];
}
