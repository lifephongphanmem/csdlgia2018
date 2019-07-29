<?php

namespace App\Model\manage\dinhgia\thuetn;

use Illuminate\Database\Eloquent\Model;

class ThueTaiNguyen extends Model
{
    protected $table = 'thuetainguyen';
    protected $fillable = [
        'id',
        'matn',
        'manhom',
        'cap1',
        'cap2',
        'cap3',
        'cap4',
        'cap5',
        'dvt',
        'dongia',
        'nam',
        'soqd',
        'trangthai',
    ];
}
