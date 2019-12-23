<?php

namespace ConfrariaWeb\Location\Controllers;

use ConfrariaWeb\Location\DataTables\CityRegionDataTable;
use ConfrariaWeb\Location\Requests\StoreCityRegionRequest;
use ConfrariaWeb\Location\Requests\UpdateCityRegionRequest;
use ConfrariaWeb\Location\Resources\CityRegionResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityRegionController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(Request $request){
        $where['name'] = isset($request->term)? $request->term : NULL;
        $where['city_id'] = isset($request->city_id)? $request->city_id : NULL;
        return CityRegionResource::collection(resolve('CityRegionService')->where($where)->get());
    }

    public function trashed()
    {
        $this->data['countries'] = resolve('CountryService')->trashed();
        return view('location::countries.index', $this->data);
    }

    public function index(StoreCityRegionRequest $countryDataTable)
    {
        $this->data['countries'] = resolve('CountryService')->all();
        return $countryDataTable->render('location::countries.index', $this->data);
    }

    public function create()
    {
        return view('location::countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        $input = $request->all();
        $country = resolve('CountryService')->create($input);
        return redirect()
            ->route('admin.locations.countries.edit', $country->id)
            ->with('status', __('location::countries.created.successfully'));
    }

    public function show($id)
    {
        //$data['country'] = resolve('CountryService')->find($id);
        abort('404');
    }

    public function edit($id)
    {
        $data['country'] = resolve('CountryService')->find($id);
        return view('location::countries.edit', $data);
    }

    public function update(UpdateCityRegionRequest $request, $id)
    {
        $input = $request->all();
        $country = resolve('CountryService')->update($input, $id);
        return redirect()
            ->route('admin.locations.countries.edit', $country->id)
            ->with('status', __('location::countries.update.successfully'));
    }

    public function destroy($id)
    {
        $country = resolve('CountryService')->destroy($id);
        return redirect()
            ->route('admin.locations.countries.index')
            ->with('status', __('location::countries.destroy.successfully'));
    }

}
