<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueDatNuoc extends Model
{
    protected $table = 'giathuedatnuoc';
    protected $fillable = [
        'id',
        'mahs',
        'district',
        'soqd',
        'ngayapdung',
        'trangthai',
    ];
}
