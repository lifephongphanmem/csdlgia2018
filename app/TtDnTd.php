<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtDnTd extends Model
{
    protected $table = 'ttdntd';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'tendn',
        'diachi',
        'tel',
        'fax',
        'email',
        'diadanh',
        'chucdanh',
        'nguoiky',
        'noidknopthue',
        'giayphepkd',
        'tailieu',
        'settingdvvt',
        'vtxk',
        'vtxb',
        'vtxtx',
        'vtch',
        'ghichu',
        'trangthai',
        'level',
        'lydo',
    ];
}
