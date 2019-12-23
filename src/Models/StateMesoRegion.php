<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateMesoRegion extends Model
{

    use SoftDeletes;

    protected $table = 'location_state_meso_regions';

    protected $fillable = [
        'state_id',
        'name'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

}
