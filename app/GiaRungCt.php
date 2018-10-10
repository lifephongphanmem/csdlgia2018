<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaRungCt extends Model
{
    protected $table = 'giarungct';
    protected $fillable = [
        'id',
        'mahs',
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
