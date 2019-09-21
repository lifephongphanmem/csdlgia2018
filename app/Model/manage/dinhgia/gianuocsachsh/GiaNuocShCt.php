<?php

namespace App\Model\manage\dinhgia\gianuocsachsh;

use Illuminate\Database\Eloquent\Model;

class GiaNuocShCt extends Model
{
    protected $table = 'gianuocshct';
    protected $fillable = [
        'id',
        'madoituong',
        'doituongsd',
        'giachuathue',
        'thuevat',
        'giacothue',
        'phibvmttyle',
        'phibvmt',
        'thanhtien',
        'mahs',
        'trangthai'
    ];
}
