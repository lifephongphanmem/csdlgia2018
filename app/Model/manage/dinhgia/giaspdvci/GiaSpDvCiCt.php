<?php

namespace App\Model\manage\dinhgia\giaspdvci;

use Illuminate\Database\Eloquent\Model;

class GiaSpDvCiCt extends Model
{
    protected $table = 'giaspdvcict';
    protected $fillable = [
        'id',
        'mahs',
        'mota',
        'dvt',
        'gia',
        'trangthai',
    ];
}
