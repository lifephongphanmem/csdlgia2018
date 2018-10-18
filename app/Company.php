<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
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
        'settingdvvt',
        'vtxk',
        'vtxb',
        'vtxtx',
        'vtch',
        'ghichu',
        'trangthai',
        'tailieu',
        'giayphepkd',
        'level',
        'avatar',
        'pl'
    ];
}
