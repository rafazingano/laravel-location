<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    use SoftDeletes;

    protected $table = 'location_addresses';

    protected $fillable = [
        'city_id',
        'city_region_id',
        'neighborhood_id',
        'street_id',
        'name',
        'number',
        'complement',
        'postal_code'
    ];

    protected $casts = [
        'complement' => 'collection'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cityRegion()
    {
        return $this->belongsTo(CityRegion::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id');
    }

}
