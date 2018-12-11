<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmThamDinhGiaHh extends Model
{
    protected $table = 'dmthamdinhgiahh';
    protected $fillable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi',
    ];
}
