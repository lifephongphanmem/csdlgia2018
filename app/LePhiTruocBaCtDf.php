<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LePhiTruocBaCtDf extends Model
{
    protected $table = 'lephitruocbactdf';
    protected $fillable = [
        'id',
        'mahuyen',
        'manhom',
        'nhanhieu',
        'tentm',
        'ttlv',
        'socho',
        'giatinhlptb',
    ];
}
