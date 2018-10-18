<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhDvKCt extends Model
{
    protected $table = 'giahhdvkct';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'district',
        'manhom',
        'mahhdv',
        'tenhhdv',
        'dacdiemkt',
        'dvt',
        'giatoithieu',
        'giatoida',
    ];
}
