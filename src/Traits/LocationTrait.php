<?php

namespace ConfrariaWeb\Location\Traits;

trait LocationTrait
{

    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

}
