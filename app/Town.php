<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'town';
    protected $fillable = [
        'id',
        'mahuyen',
        'maxa',
        'town',
        'district',
        'tendv',
        'diachi',
        'ttlienhe',
        'emailql',
        'emailqt',
        'songaylv',
        'tendvhienthi',
        'tendvcqhienthi',
        'chucvuky',
        'chucvukythay',
        'nguoiky',
        'diadanh',
    ];
}
