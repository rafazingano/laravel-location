<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Contracts\CountryContract;
use ConfrariaWeb\Location\Models\Country;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class CountryRepository implements CountryContract
{
    use RepositoryTrait;

    function __construct(Country $country)
    {
        $this->obj = $country;
    }

    public function syncs($obj, array $data)
    {
        if(isset($data['regions'])) {
            $obj->regions()->delete();
            $obj->regions()->createMany($data['regions']);
        }
    }

}
