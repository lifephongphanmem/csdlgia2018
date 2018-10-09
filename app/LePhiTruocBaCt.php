<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LePhiTruocBaCt extends Model
{
    protected $table = 'lephitruocbact';
    protected $fillable = [
        'id',
        'mahs',
        'manhom',
        'nhanhieu',
        'tentm',
        'ttlv',
        'socho',
        'giatinhlptb'
        ];
}
