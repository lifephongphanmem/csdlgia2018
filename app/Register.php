<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
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

        'ghichu',
        'tailieu',
        'giayphepkd',
        'username',
        'password',
        'level',
        'trangthai',
        'lydo',
        'ma',
        'pl',

        'settingdvvt',
        'vtxk',
        'vtxb',
        'vtxtx',
        'vtch',

        'loaihinhhd',
        'xangdau',
        'dien',
        'khidau',
        'phan',
        'thuocbvtv',
        'vacxingsgc',
        'muoi',
        'suate6t',
        'duong',
        'thocgao',
        'thuocpcb',
    ];
}
