<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Contracts\AddressContract;
use ConfrariaWeb\Location\Models\Address;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;
use Illuminate\Support\Facades\Log;

class AddressRepository implements AddressContract
{
    use RepositoryTrait;

    function __construct(Address $address)
    {
        $this->obj = $address;
    }

    public function orderBy($obj, $order, $by = 'ASC')
    {
        if ($order == 'street') {
            $this->obj = $obj->leftJoin('location_streets', 'addresses.street_id', '=', 'location_streets.id')
                ->orderBy('name', $by);
        }
        return $this;
    }



}
