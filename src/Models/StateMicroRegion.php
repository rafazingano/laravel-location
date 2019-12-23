<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateMicroRegion extends Model
{

    use SoftDeletes;

    protected $table = 'location_state_micro_regions';

    protected $fillable = [
        'state_meso_region_id',
        'name'
    ];

}
