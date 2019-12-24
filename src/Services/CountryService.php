<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\CountryContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class CountryService
{
    use ServiceTrait;

    public function __construct(CountryContract $country)
    {
        $this->obj = $country;
    }

}
