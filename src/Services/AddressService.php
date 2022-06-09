<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Models\Address;
use ConfrariaWeb\Location\Models\City;
use ConfrariaWeb\Location\Models\Country;
use ConfrariaWeb\Location\Models\District;
use ConfrariaWeb\Location\Models\State;
use ConfrariaWeb\Location\Models\Street;

class AddressService
{

    protected $country;
    protected $state;
    protected $city;
    protected $district;
    protected $street;
    protected $address;

    public function __construct(
        Country $country,
        State $state,
        City $city,
        District $district,
        Street $street,
        Address $address
    )
    {
        $this->address = $address;
        $this->country = $country;
        $this->state = $state;
        $this->city = $city;
        $this->district = $district;
        $this->street = $street;
        $this->data = [];
    }

    public function prepareData($data){

        if(isset($data['district']) && isset($data['city_id'])){
            $district = $this->district->updateOrCreate(['city_id' => $data['city_id'], 'name' => $data['district']]);
            $data['district_id'] = $district->id;
        }
        if(isset($data['street'])){
            $street = $this->street->updateOrCreate(['name' => $data['street']]);
            $data['street_id'] = $street->id;
        }
        return $data;
    }
}
