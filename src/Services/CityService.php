<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\CityContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class CityService
{
    use ServiceTrait;

    public function __construct(CityContract $city)
    {
        $this->obj = $city;
    }

}
