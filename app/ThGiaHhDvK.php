<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThGiaHhDvK extends Model
{
    protected $table = 'thgiahhdvk';
    protected $fillable = [
        'id',
        'sobc',
        'ngaybc',
        'ngaychotbc',
        'ttbc',
        'matt',
        'mahs',
        'thang',
        'nam',
        'phanloai',
        'ghichu',
        'congbo',
        'trangthai',

    ];
}
