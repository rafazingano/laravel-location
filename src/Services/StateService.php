<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Models\State;

class StateService
{

    public function __construct()
    {
        //
    }

    public function all($country_id = NULL){
        return State::where('country_id', $country_id)->get();
    }

}
