<?php

namespace App\Model\manage\dinhgia\giathitruong;

use Illuminate\Database\Eloquent\Model;

class GiaThiTruongDm extends Model
{
    protected $table = 'giathitruongdm';
    protected $fillable = [
        'id',
        'matt',
        'manhom',
        'tennhom',
        'mahh',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'mahuyen',
        'theodoi',
    ];
}
