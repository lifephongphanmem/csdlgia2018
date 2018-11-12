<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaNuocShCt extends Model
{
    protected $table = 'gianuocshct';
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
        'mahs'
    ];
}
