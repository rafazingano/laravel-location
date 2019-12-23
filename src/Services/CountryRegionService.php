<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\CountryRegionContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class CountryRegionService
{
    use ServiceTrait;

    public function __construct(CountryRegionContract $region)
    {
        $this->obj = $region;
    }

}
