<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Models\City;

class CityService
{

    public function __construct()
    {
        //
    }

    public function all($state_id = NULL){
        return City::where('state_id', $state_id)->get();
    }

}
