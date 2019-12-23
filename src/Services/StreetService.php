<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\StreetContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class StreetService
{
    use ServiceTrait;

    public function __construct(StreetContract $street)
    {
        $this->obj = $street;
    }
}
