<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Models\District;

class DistrictService
{

    public function __construct()
    {
        //
    }

    public function all($city_id = NULL){
        return District::where('city_id', $city_id)->get();
    }

}
