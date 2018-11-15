<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueMuaNhaXhCt extends Model
{
    protected $table = 'giathuemuanhaxhct';
    protected $fillable = [
        'id',
        'mahs',
        'loainha',
        'dongia',
        'hesodc',
        'thoigian',
    ];
}
