<?php

namespace ConfrariaWeb\Location\Traits;

trait LocationTrait
{

    public function addresses()
    {
        return $this->morphMany('ConfrariaWeb\Location\Models\Address', 'addressable');
    }

}
