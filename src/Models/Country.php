<?php

namespace ConfrariaWeb\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{

    use SoftDeletes;

    protected $table = 'location_countries';

    protected $fillable = [
        'name',
        'code_phone',
        'lang',
    ];

    public function scopeCode($query, $code)
    {
        if (is_numeric($code)) {
            $qry = $query->where('id', $code);
        } elseif (is_string($code)) {
            $qry = $query->where('code_iso2', $code);
        }

        return $qry;
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function regions()
    {
        return $this->hasMany(CountryRegion::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

}
