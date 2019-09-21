<?php

namespace App\Model\manage\dinhgia;

use Illuminate\Database\Eloquent\Model;

class GiaThueNhaCongVu extends Model
{
    protected $table = 'giathuenhacongvu';
    protected $fillable = [
        'id',
	    'district',
        'manhom',
        'tenduan',
        'mota',
        'dientich',
        'dvt',
        'dongiathue',
        'thoidiemkc',
        'thoidiemht',
        'ttqd',
        'ghichu',
        'trangthai'
    ];
}
