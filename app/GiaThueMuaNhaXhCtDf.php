<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueMuaNhaXhCtDf extends Model
{
    protected $table = 'giathuemuanhaxhctdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'loainha',
        'dongia',
        'hesodc',
        'thoigian',
    ];
}
