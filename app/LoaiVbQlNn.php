<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiVbQlNn extends Model
{
    protected $table = 'loaivbqlnn';
    protected $fillable = [
        'id',
        'maloaivb',
        'tenvb',
    ];
}
