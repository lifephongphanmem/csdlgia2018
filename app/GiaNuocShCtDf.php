<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaNuocShCtDf extends Model
{
    protected $table = 'gianuocshctdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'doituong',
        'giachuathue',
        'thuevat',
        'giacothue',
        'phibvmttyle',
        'phibvmt',
        'thanhtien',
    ];
}
