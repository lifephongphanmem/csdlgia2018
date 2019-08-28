<?php

namespace App\Model\system\company;

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
        'mahs',

        'ghichu',
        'trangthai',
        'tailieu',
        'giayphepkd',
        'level',
        'avatar',
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
