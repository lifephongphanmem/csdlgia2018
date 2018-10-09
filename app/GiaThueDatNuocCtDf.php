<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueDatNuocCtDf extends Model
{
    protected $table = 'giathuedatnuocctdf';
    protected $fillable = [
        'id',
        'district',
        'vitri',
        'mota',
        'dientich',
        'dongia',
    ];
}
