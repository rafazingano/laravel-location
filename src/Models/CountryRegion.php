<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryRegion extends Model
{

    use SoftDeletes;

    protected $table = 'location_country_regions';

    protected $fillable = [
        'country_id',
        'name'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

}
