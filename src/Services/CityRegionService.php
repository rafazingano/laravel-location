<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\CityRegionContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class CityRegionService
{
    use ServiceTrait;

    public function __construct(CityRegionContract $region)
    {
        $this->obj = $region;
    }

}
