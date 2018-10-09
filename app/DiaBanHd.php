<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaBanHd extends Model
{
    protected $table = 'diabanhd';
    protected $fillable = [
        'id',
        'town',
        'district',
        'diaban',
        'level',
    ];
}
