<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Contracts\CountryRegionContract;
use ConfrariaWeb\Location\Models\CountryRegion;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class CountryRegionRepository implements CountryRegionContract
{
    use RepositoryTrait;

    function __construct(CountryRegion $region)
    {
        $this->obj = $region;
    }

}
