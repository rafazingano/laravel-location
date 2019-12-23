<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neighborhood extends Model
{

    use SoftDeletes;

    protected $table = 'location_neighborhoods';

    protected $fillable = [
        'name'
    ];

    public function addresses()
    {
        return $this->hasMany(Location::class);
    }

}
