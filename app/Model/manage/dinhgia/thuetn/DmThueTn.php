<?php

namespace App\Model\manage\dinhgia\thuetn;

use Illuminate\Database\Eloquent\Model;

class DmThueTn extends Model
{
    protected $table = 'dmthuetn';
    protected $fillable = [
        'id',
        'level',
        'ten',
        'manhom',
        'cap1',
        'cap2',
        'cap3',
        'cap4',
        'cap5',
        'dvt',
        'sapxep',
        'theodoi',
    ];
}
