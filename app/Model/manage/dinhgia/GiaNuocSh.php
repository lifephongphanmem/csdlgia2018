<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaNuocSh extends Model
{
    protected $table = 'gianuocsh';
    protected $fillable = [
        'id',
        'soqd',
        'ngayapdung',
        'ghichu',
        'diaban',
        'doituong',
        'mota',
        'giachuathue',
        'thuevat',
        'giacothue',
        'phibvmttyle',
        'phibvmt',
        'thanhtien',
        'dvt',
        'trangthai',
        'username',
        'thaotac',
    ];
}
