<?php

namespace ConfrariaWeb\Location\Controllers;

use ConfrariaWeb\Location\DataTables\AddressDataTable;
use ConfrariaWeb\Location\Requests\StoreAddressRequest;
use ConfrariaWeb\Location\Requests\UpdateAddressRequest;
use ConfrariaWeb\Location\Resources\AddressResource;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(){
        return AddressResource::collection(resolve('AddressService')->all());
    }

    public function trashed()
    {
        $this->data['addreses'] = resolve('AddressService')->trashed();
        return view(config('cw_location.views') . 'addresses.index', $this->data);
    }

    public function index(AddressDataTable $addressDataTable)
    {
        $this->data['addresses'] = resolve('AddressService')->all();
        return $addressDataTable->render(config('cw_location.views') . 'addresses.index', $this->data);
    }

    public function create()
    {
        return view(config('cw_location.views') . 'addresses.create', $this->data);
    }

    public function store(StoreAddressRequest $request)
    {
        $input = $request->all();
        $country = resolve('AddressService')->create($input);
        return redirect()
            ->route('admin.locations.addresses.edit', $country->id)
            ->with('status', __('location::addresses.created.successfully'));
    }

    public function show($id)
    {
        //$data['country'] = resolve('AddressService')->find($id);
        abort('404');
    }

    public function edit($id)
    {
        $data['country'] = resolve('AddressService')->find($id);
        return view(config('cw_location.views') . 'addresses.edit', $data);
    }

    public function update(UpdateAddressRequest $request, $id)
    {
        $input = $request->all();
        $country = resolve('AddressService')->update($input, $id);
        return redirect()
            ->route('admin.locations.addresses.edit', $country->id)
            ->with('status', __('location::addresses.update.successfully'));
    }

    public function destroy($id)
    {
        $country = resolve('AddressService')->destroy($id);
        return redirect()
            ->route('admin.locations.addresses.index')
            ->with('status', __('location::addresses.destroy.successfully'));
    }

}
