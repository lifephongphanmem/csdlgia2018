<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaTaiSanCongDm extends Model
{
    protected $table = 'giataisancongdm';
    protected $fillable = [
        'id',
        'mataisan',
        'tentaisan',
        'dientich',
        'dvt',
        'mota',
        'giatri',
        'mahuyen',
        'maxa',
    ];
}
