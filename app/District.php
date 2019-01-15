<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    protected $fillable = [
        'id',
        'mahuyen',
        'tendv',
        'district',
        'diachi',
        'phanloaiql',
        'ttlienhe',
        'emailql',
        'emailqt',
        'tendvhienthi',
        'tendvcqhienthi',
    ];
}
