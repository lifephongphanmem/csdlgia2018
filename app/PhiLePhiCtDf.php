<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhiLePhiCtDf extends Model
{
    protected $table = 'philephictdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'ptcp',
        'mucthuphi',
        'ghichu'
    ];
}
