<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmPhiLePhi extends Model
{
    protected $table = 'dmphilephi';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'dvt'
    ];
}
