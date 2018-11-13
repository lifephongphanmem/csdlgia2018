<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDvGdDtCtDf extends Model
{
    protected $table = 'giadvgddtctdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'mota',
        'giadv',
    ];
}
