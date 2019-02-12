<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiSoGiaTieuDung extends Model
{
    protected $table = 'chisogiatieudung';
    protected $fillable = [
        'id',
        'mahs',
        'maxa',
        'mahuyen',
        'thongtinbc',
        'ngaybaocao',
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
        'trangthai',
        'congbo',
    ];
}
