<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\StateContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class StateRegionMesoService
{
    use RepositoryTrait;

    public function __construct(StateContract $state)
    {
        $this->obj = $state;
    }

}
