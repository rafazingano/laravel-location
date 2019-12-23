<?PHP

namespace ConfrariaWeb\Location\Repositories;

use ConfrariaWeb\Location\Models\City;
use ConfrariaWeb\Location\Contracts\CityContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CityRepository implements CityContract
{
    use RepositoryTrait;

    function __construct(City $city)
    {
        $this->obj = $city;
    }

    public function orderBy($order = 'id', $by = 'asc')
    {
        $this->obj = $this->obj
            ->when(('state' == $order), function ($query) use ($order, $by) {
                return $query
                    ->leftJoin('states AS orderByStates', 'cities.state_id', '=', 'orderByStates.id')
                    ->groupBy('cities.id')
                    ->orderBy('orderByStates.name', $by);
            })

            ->when(('state_micro_region' == $order), function ($query) use ($order, $by) {
                return $query
                    ->leftJoin('state_micro_regions AS orderByStatesMicroRegions', 'cities.state_micro_region_id', '=', 'orderByStatesMicroRegions.id')
                    ->groupBy('cities.id')
                    ->orderBy('orderByStatesMicroRegions.name', $by);
            })

            ->when(('addresses_count' == $order), function ($query) use ($order, $by) {
                return $query
                    ->withCount('addresses')
                    ->orderBy('addresses_count', 'desc');
            })
            ->when(in_array($order, ['name']), function ($query) use ($order, $by) {
                return $query->orderBy($order, $by);
            });
        return $this;
    }

    public function where(array $data = [], $take = null)
    {
        $this->obj = $this->obj
            ->when(isset($data['state_code']), function ($query) use ($data) {
                return $query
                    ->addSelect(DB::raw('location_cities.*'))
                    ->leftJoin('location_states AS whereStates', 'location_cities.state_id', '=', 'whereStates.id')
                    ->where('whereStates.code', $data['state_code']);
            })
            ->when(isset($data['state_id']), function ($query) use ($data) {
                return $query->where('location_cities.state_id', $data['state_id']);
            })
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('location_cities.name', 'like', '%' . $data['name'] . '%');
            });
        return $this;
    }

}
