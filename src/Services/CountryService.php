<?PHP

namespace ConfrariaWeb\Location\Services;

use ConfrariaWeb\Location\Contracts\CountryContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class CountryService
{
    use ServiceTrait;

    public function __construct(CountryContract $country)
    {
        $this->obj = $country;
    }

    public function prepareData(array $data)
    {
        if(isset($data['sync'])){
            if(isJSON($data['sync']['regions'])){
                $regions = collect(json_decode($data['sync']['regions'], true))->map(function ($name) {
                    return ['name' => $name['value']];
                });
            }
            $data['sync']['regions'] = $regions;
        }
        return $data;
    }

}
