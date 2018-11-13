<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDvGdDtCt extends Model
{
    protected $table = 'giadvgddtct';
    protected $fillable = [
        'id',
        'mahs',
        'mota',
        'giadv',
    ];
}
