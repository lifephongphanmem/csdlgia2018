<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueDatNuocCt extends Model
{
    protected $table = 'giathuedatnuocct';
    protected $fillable = [
        'id',
        'mahs',
        'vitri',
        'mota',
        'dientich',
        'dongia',
    ];
}
