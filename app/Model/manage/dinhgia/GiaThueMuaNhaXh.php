<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaThueMuaNhaXh extends Model
{
    protected $table = 'giathuemuanhaxh';
    protected $fillable = [
        'id',
        'district',
        'manhom',
        'tenduan',
        'mota',
        'dientich',
        'dvt',
        'dongiathue',
        'dongiathuemua',
        'thoidiem',
        'ttqd',
        'ghichu',
        'trangthai'
    ];
}
