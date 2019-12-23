<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Models\Street;
use ConfrariaWeb\Location\Contracts\StreetContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class StreetRepository implements StreetContract
{
    use RepositoryTrait;

    function __construct(Street $street)
    {
        $this->obj = $street;
    }

    public function where(array $data = [])
    {
        $this->obj = $this->obj
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('location_streets.name', 'like', '%' . $data['name'] . '%');
            });
        return $this;
    }
}
