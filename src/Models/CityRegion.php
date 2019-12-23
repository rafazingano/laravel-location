<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityRegion extends Model
{

    use SoftDeletes;

    protected $table = 'location_city_regions';

    protected $fillable = [
        'city_id',
        'name'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
