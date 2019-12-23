<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\NeighborhoodContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class NeighborhoodService
{
    use ServiceTrait;

    public function __construct(NeighborhoodContract $neighborhood)
    {
        $this->obj = $neighborhood;
    }

}
