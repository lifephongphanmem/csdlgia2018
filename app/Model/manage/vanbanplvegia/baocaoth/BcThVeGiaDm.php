<?php

namespace App\Model\manage\vanbanplvegia\baocaoth;

use Illuminate\Database\Eloquent\Model;

class BcThVeGiaDm extends Model
{
    protected $table = 'bcthvegiadm';
    protected $fillable = [
        'id',
        'phanloai',
        'mota',
        'theodoi',
    ];
}
