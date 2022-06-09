<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Models\Country;

class CountryService
{

    public function __construct()
    {
        //
    }

    public function all(){
        return Country::all();
    }

}
