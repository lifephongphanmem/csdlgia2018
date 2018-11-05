<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatCtDf extends Model
{
    protected $table = 'daugiadatctdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'vitridiadiem',
        'mucgiasan',
        'mucgiadaugia',
        'donvidaugia',
    ];
}
