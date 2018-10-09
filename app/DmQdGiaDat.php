<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmQdGiaDat extends Model
{
    protected $table = 'dmqdgiadat';
    protected $fillable = [
        'id',
        'soquyetdinh',
        'sohieu',
        'mota',
        'ngayquyetdinh',
        'ghichu'
    ];
}
