<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\StateContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class StateService
{
    use RepositoryTrait;

    public function __construct(StateContract $state)
    {
        $this->obj = $state;
    }

}
