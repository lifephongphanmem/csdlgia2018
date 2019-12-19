<?php

namespace App\Model\manage\dinhgia\gialephitruocbanha;

use Illuminate\Database\Eloquent\Model;

class GiaLpTbNha extends Model
{
    protected $table = 'gialptbnha';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngaybh',
        'ngayad',
        'dvbh',
        'ghichuxdm',
        'ghichuclcl',
        'trangthai'
    ];
}
