<?php

namespace App\Model\manage\dinhgia\gianuocsachsh;

use Illuminate\Database\Eloquent\Model;

class GiaNuocSachShDm extends Model
{
    protected $table = 'gianuocsachshdm';
    protected $fillable = [
        'id',
        'madoituong',
        'doituongsd '
    ];
}
