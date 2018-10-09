<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LePhiTruocBa extends Model
{
    protected $table = 'lephitruocba';
    protected $fillable = [
        'id',
        'mahs',
        'soqd',
        'ngayapdung',
        'trangthai'
        ];
}
