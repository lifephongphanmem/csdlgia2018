<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class BanNhaTaiDinhCu extends Model
{
    protected $table = 'bannhataidinhcu';
    protected $fillable = [
        'id',
        'district',
        'manhom',
        'tenduan',
        'mota',
        'dientich',
        'dvt',
        'dongiaban',
        'dongiathuemua',
        'thoidiemkc',
        'thoidiemht',
        'ttqd',
        'ghichu',
        'trangthai'
    ];
}
