<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Street extends Model
{

    use SoftDeletes;

    protected $table = 'location_streets';

    protected $fillable = [
        'name'
    ];
}
