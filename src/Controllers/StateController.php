<?php

namespace ConfrariaWeb\Location\Controllers;

use ConfrariaWeb\Location\DataTables\StateDataTable;
use ConfrariaWeb\Location\Requests\StoreStateRequest;
use ConfrariaWeb\Location\Requests\UpdateStateRequest;
use ConfrariaWeb\Location\Resources\StateResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(Request $request){
        $where['name'] = isset($request->term)? $request->term : NULL;
        $where['country_id'] = isset($request->country_id)? $request->country_id : NULL;
        return StateResource::collection(resolve('StateService')->where($where)->get());
    }

    public function trashed()
    {
        $this->data['states'] = resolve('StateService')->trashed();
        return view(config('cw_location.views') . 'states.index', $this->data);
    }

    public function index(StateDataTable $StateDataTable)
    {
        $this->data['states'] = resolve('StateService')->all();
        return $StateDataTable->render(config('cw_location.views') . 'states.index', $this->data);
    }

    public function create()
    {
        return view(config('cw_location.views') . 'states.create');
    }

    public function store(StoreStateRequest $request)
    {
        $input = $request->all();
        $State = resolve('StateService')->create($input);
        return redirect()
            ->route('admin.locations.states.edit', $State->id)
            ->with('status', __('location::states.created.successfully'));
    }

    public function show($id)
    {
        //$data['State'] = resolve('StateService')->find($id);
        abort('404');
    }

    public function edit($id)
    {
        $data['state'] = resolve('StateService')->find($id);
        return view(config('cw_location.views') . 'states.edit', $data);
    }

    public function update(UpdateStateRequest $request, $id)
    {
        $input = $request->all();
        $State = resolve('StateService')->update($input, $id);
        return redirect()
            ->route('admin.locations.states.edit', $State->id)
            ->with('status', __('location::states.update.successfully'));
    }

    public function destroy($id)
    {
        $State = resolve('StateService')->destroy($id);
        return redirect()
            ->route('admin.locations.states.index')
            ->with('status', __('location::states.destroy.successfully'));
    }
}
