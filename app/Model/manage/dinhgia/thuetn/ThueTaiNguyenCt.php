<?php

namespace App\Model\manage\dinhgia\thuetn;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyenCt extends Model
{
    protected $table = 'thuetainguyenct';
    protected $fillable = [
        'id',
        'mahs',
        'level',
        'cap1',
        'cap2',
        'cap3',
        'cap4',
        'cap5',
        'ten',
        'dvt',
        'gia',
        'trangthai',
    ];
}
