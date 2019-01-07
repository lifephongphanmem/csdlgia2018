<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hsgia_cpi extends Model
{
    protected $table = 'hsgia_cpi';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'tgnhap',
        'noidung',
        'nam',
        'thang',
        'maxa',
        'mahuyen',
        'district',
        'trangthai',
        'phanloai',
        'ipt1',
        'ipf1',
        'ipt2',
        'ipf2',
        'ipt3',
        'ipf3',
        'ipt4',
        'ipf4',
        'ipt5',
        'ipf5',
    ];
}
