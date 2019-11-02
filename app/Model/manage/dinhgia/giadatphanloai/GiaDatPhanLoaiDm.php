<?php

namespace App\Model\manage\dinhgia\giadatphanloai;

use Illuminate\Database\Eloquent\Model;

class GiaDatPhanLoaiDm extends Model
{
    protected $table = 'giadatphanloaidm';
    protected $fillable = [
        'id',
        'loaidat',
        'mavitri',
        'tenvitri',
        'dientich',
        'giatri',
        'mota',
        'mahuyen',
        'maxa',
    ];
}
