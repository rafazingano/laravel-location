<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Contracts\StateContract;
use ConfrariaWeb\Location\Models\State;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class StateRepository implements StateContract
{
    use RepositoryTrait;

    function __construct(State $state)
    {
        $this->obj = $state;
    }

    public function where(array $data = [])
    {
        $this->obj = $this->obj
            ->when(isset($data['country_id']), function ($query) use ($data) {
                return $query->where('location_states.country_id', $data['country_id']);
            })
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('location_states.name', 'like', '%' . $data['name'] . '%');
            });
        return $this;
    }

}
