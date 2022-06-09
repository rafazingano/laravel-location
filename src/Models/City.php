<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    use SoftDeletes;

    protected $table = 'location_cities';

    protected $fillable = [
        'state_id',
        'state_micro_region_id',
        'name'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function stateMicroRegion()
    {
        return $this->belongsTo(StateMicroRegion::class, 'state_micro_region_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function addresses()
    {
        return $this->hasMany(Location::class);
    }

}
