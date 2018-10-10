<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaRungCtDf extends Model
{
    protected $table = 'giarungctdf';
    protected $fillable = [
        'id',
        'maxa',
        'mahuyen',
        'district',
        'manhom',
        'loairung',
        'mucdo',
        'dongiasd',
        'dongiat50',
        'dongiat1',
        'dongiaxp'
    ];
}
