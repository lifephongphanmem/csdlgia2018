<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TtDnTdCt extends Model
{
    protected $table = 'ttdntdct';
    protected $fillable = [
        'id',
        'maxa',
        'manganh',
        'manghe',
        'mahuyen',
        'trangthai',
    ];
}
