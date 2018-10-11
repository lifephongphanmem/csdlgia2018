<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyenCtDf extends Model
{
    protected $table = 'thuetainguyenctdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'manhom',
        'magoc',
        'mahh',
        'capdo',
        'tenhh',
        'dvt',
        'giatttn',
    ];
}
