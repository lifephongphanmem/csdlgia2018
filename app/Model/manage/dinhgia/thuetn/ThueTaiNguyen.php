<?php

namespace App\Model\manage\dinhgia\thuetn;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyen extends Model
{
    protected $table = 'thuetainguyen';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngayqd',
        'cqbh',
        'nam',
        'manhom',
        'trangthai',
    ];
}
