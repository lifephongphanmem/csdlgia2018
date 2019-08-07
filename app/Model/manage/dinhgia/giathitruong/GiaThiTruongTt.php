<?php

namespace App\Model\manage\dinhgia\giathitruong;

use Illuminate\Database\Eloquent\Model;

class GiaThiTruongTt extends Model
{
    protected $table = 'giathitruongtt';
    protected $fillable = [
        'id',
        'matt',
        'ttqd',
        'mota',
        'ghichu',
        'theodoi',
    ];
}
