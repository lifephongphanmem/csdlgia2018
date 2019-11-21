<?php

namespace App\Model\manage\dinhgia\giathitruong;

use Illuminate\Database\Eloquent\Model;

class GiaThiTruong extends Model
{
    protected $table = 'giathitruong';
    protected $fillable = [
        'id',
        'thanglk',
        'thang',
        'namlk',
        'nam',
        'sobc',
        'ngaybc',
        'mahuyen',
        'trangthai',
        'mahs',
        'matt'
    ];
}
