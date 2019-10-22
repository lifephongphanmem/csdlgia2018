<?php

namespace App\Model\manage\kekhaidkg;

use Illuminate\Database\Eloquent\Model;

class kkdkg extends Model
{
    protected $table = 'kkdkg';
    protected $fillable = [
        'id',
        'congbo',
        'mahs',
        'maxa',
        'mahuyen',
        'theoqd',
        'ngaynhap',
        'socv',
        'socvlk',
        'ngaycvlk',
        'ngayhieuluc',
        'nguoinop',
        'dtlh',
        'fax',
        'ngaynhan',
        'sohsnhan',
        'ngaychuyen',
        'lydo',
        'trangthai',
        'plhs',
        'pldn',
        'thoihan',
        'phanloai',
        'ghichu',
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
