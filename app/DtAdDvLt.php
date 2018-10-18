<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtAdDvLt extends Model
{
    protected $table = 'dtapdungdvlt';
    protected $fillable = [
        'id',
        'madtad',
        'tendtad',
    ];
}
