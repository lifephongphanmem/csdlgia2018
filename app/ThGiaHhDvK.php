<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThGiaHhDvK extends Model
{
    protected $table = 'thgiahhdvk';
    protected $fillable = [
        'id',
        'ngaybc',
        'ngaychotbc',
        'ttbc',
        'manhom',
        'mahs',
        'trangthai',
    ];
}
