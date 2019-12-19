<?php

namespace App\Model\manage\dinhgia\gialephitruocbanha;

use Illuminate\Database\Eloquent\Model;

class GiaLpTbNhaCtXdm extends Model
{
    protected $table = 'gialptbnhactxdm';
    protected $fillable = [
        'id',
        'mahs',
        'district',
        'loaict',
        'capnha',
        'dvt',
        'dongia',
        'trangthai',
    ];
}
