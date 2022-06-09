<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{

    use SoftDeletes;

    protected $table = 'location_districts';

    protected $fillable = [
        'city_id', 'name'
    ];

    public function addresses()
    {
        return $this->hasMany(Location::class);
    }

}
