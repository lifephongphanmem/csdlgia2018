<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewPage extends Model
{
    protected $table = 'viewpage';
    protected $fillable = [
        'id',
        'ip',
        'session'
    ];
}
