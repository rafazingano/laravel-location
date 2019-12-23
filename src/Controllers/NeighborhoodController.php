<?php

namespace ConfrariaWeb\Location\Controllers;

use ConfrariaWeb\Location\DataTables\NeighborhoodDataTable;
use ConfrariaWeb\Location\Requests\StoreNeighborhoodRequest;
use ConfrariaWeb\Location\Requests\UpdateNeighborhoodRequest;
use ConfrariaWeb\Location\Resources\NeighborhoodResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(Request $request){
        $where['name'] = isset($request->term)? $request->term : NULL;
        return NeighborhoodResource::collection(resolve('NeighborhoodService')->where($where)->get());
    }

    public function trashed()
    {
        $this->data['neighborhoods'] = resolve('NeighborhoodService')->trashed();
        return view('location::neighborhoods.index', $this->data);
    }

    public function index(NeighborhoodDataTable $neighborhoodDataTable)
    {
        return $neighborhoodDataTable->render('location::neighborhoods.index', $this->data);
    }

    public function create()
    {
        return view('location::neighborhoods.create');
    }

    public function store(StoreNeighborhoodRequest $request)
    {
        $input = $request->all();
        $neighborhood = resolve('NeighborhoodService')->create($input);
        return redirect()
            ->route('admin.locations.neighborhoods.edit', $neighborhood->id)
            ->with('status', __('location::neighborhoods.created.successfully'));
    }

    public function show($id)
    {
        //$data['neighborhood'] = resolve('NeighborhoodService')->find($id);
        abort('404');
    }

    public function edit($id)
    {
        $this->data['neighborhood'] = resolve('NeighborhoodService')->find($id);
        return view('location::neighborhoods.edit', $this->data);
    }

    public function update(UpdateNeighborhoodRequest $request, $id)
    {
        $inputs = $request->all();
        $neighborhood = resolve('NeighborhoodService')->update($inputs, $id);
        return redirect()
            ->route('admin.locations.neighborhoods.edit', $neighborhood->id)
            ->with('status', __('location::neighborhoods.update.successfully'));
    }

    public function destroy($id)
    {
        $neighborhood = resolve('NeighborhoodService')->destroy($id);
        return redirect()
            ->route('admin.locations.neighborhoods.index')
            ->with('status', __('location::neighborhoods.destroy.successfully'));
    }

}
