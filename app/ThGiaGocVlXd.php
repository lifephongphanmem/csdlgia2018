<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThGiaGocVlXd extends Model
{
    protected $table = 'thgiagocvlxd';
    protected $fillable = [
        'id',
        'quy',
        'nam',
        'sobc',
        'ngaybc',
        'dvbc',
        'dvcq',
        'diadanh',
        'diabanbc',
        'mahs',
        'trangthai',
        'congbo'
    ];
}
