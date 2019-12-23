<?php

namespace ConfrariaWeb\Location\Controllers;

use ConfrariaWeb\Location\DataTables\CountryRegionDataTable;
use ConfrariaWeb\Location\Requests\StoreCountryRegionRequest;
use ConfrariaWeb\Location\Requests\UpdateCountryRegionRequest;
use ConfrariaWeb\Location\Resources\CountryRegionResource;
use App\Http\Controllers\Controller;

class CountryRegionController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json()
    {
        return CountryRegionResource::collection(resolve('CountryRegionService')->all());
    }

    public function trashed(CountryRegionDataTable $countryRegionDataTable)
    {
        $this->data['countries'] = resolve('CountryRegionService')->trashed();
        return $countryRegionDataTable->render('location::countries.index', $this->data);
    }

    public function index(CountryRegionDataTable $countryRegionDataTable)
    {
        $this->data['countries'] = resolve('CountryRegionService')->all();
        return $countryRegionDataTable->render('location::countries_regions.index', $this->data);
    }

    public function create()
    {
        $this->data['countries'] = resolve('CountryService')->pluck();
        return view('location::countries_regions.create', $this->data);
    }

    public function store(StoreCountryregionRequest $request)
    {
        $input = $request->all();
        $country = resolve('CountryRegionService')->create($input);
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
        $data['country'] = resolve('CountryRegionService')->find($id);
        return view('location::countries.edit', $data);
    }

    public function update(UpdateCountryRegionRequest $request, $id)
    {
        $input = $request->all();
        $country = resolve('CountryRegionService')->update($input, $id);
        return redirect()
            ->route('admin.locations.countries.edit', $country->id)
            ->with('status', __('location::countries.update.successfully'));
    }

    public function destroy($id)
    {
        $country = resolve('CountryRegionService')->destroy($id);
        return redirect()
            ->route('admin.locations.countries.index')
            ->with('status', __('location::countries.destroy.successfully'));
    }

}
