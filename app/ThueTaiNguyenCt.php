<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyenCt extends Model
{
    protected $table = 'thuetainguyenct';
    protected $fillable = [
        'id',
        'mahs',
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
