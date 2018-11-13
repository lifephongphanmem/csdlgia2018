<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGiaDatCtDf extends Model
{
    protected $table = 'daugiadatctdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'maxa',
        'district',
        'vitridiadiem',
        'mucgiasan',
        'mucgiadaugia',
        'donvidaugia',
    ];
}
