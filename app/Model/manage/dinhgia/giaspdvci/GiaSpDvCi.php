<?php

namespace App\Model\manage\dinhgia\giaspdvci;

use Illuminate\Database\Eloquent\Model;

class GiaSpDvCi extends Model
{
    protected $table = 'giaspdvci';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ttqd',
        'ngayqd',
        'trangthai',
    ];
}
