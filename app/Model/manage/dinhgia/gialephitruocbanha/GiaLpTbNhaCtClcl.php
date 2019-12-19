<?php

namespace App\Model\manage\dinhgia\gialephitruocbanha;

use Illuminate\Database\Eloquent\Model;

class GiaLpTbNhaCtClcl extends Model
{
    protected $table = 'gialptbnhactclcl';
    protected $fillable = [
        'id',
        'mahs',
        'capnha',
        'thoigiansd',
        'tylehm',
        'trangthai',
    ];
}
