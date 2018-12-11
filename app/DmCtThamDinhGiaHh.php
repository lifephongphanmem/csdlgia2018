<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmCtThamDinhGiaHh extends Model
{
    protected $table = 'dmctthamdinhgiahh';
    protected $fillable = [
        'id',
        'manhom',
        'nhomhh',
        'tenhh',
        'qccl',
        'dvt',
        'theodoi',
    ];
}
