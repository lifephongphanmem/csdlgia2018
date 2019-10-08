<?php

namespace App\Model\manage\vanbanplvegia\baocaoth;

use Illuminate\Database\Eloquent\Model;

class BcThVeGia extends Model
{
    protected $table = 'bcthvegia';
    protected $fillable = [
        'id',
        'mahs',
        'kyhieuvb',
        'dvbanhanh',
        'loaivb',
        'ngaybanhanh',
        'ngayapdung',
        'tieude',
        'ghichu',
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
