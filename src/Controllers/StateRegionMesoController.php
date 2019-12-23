<?php

namespace ConfrariaWeb\Location\Controllers;

use App\Http\Resources\StateResource;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;

class StateRegionMesoController extends Controller
{

    public $data;

    public function __construct()
    {

    }

    public function getPosts()
    {
        return \DataTables::of(User::query())->make(true);
    }

    public function index()
    {
        $this->data['states'] = resolve('StateService')->all();
        $this->data['countries'] = resolve('CountryService')->all();
        return view('states.index', $this->data);
    }

    public function create()
    {
        return view('states.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $State = resolve('StateService')->create($input);
        return redirect()
            ->route('states.edit', ['id' => $State->id])
            ->with('status', __('state.created.successfully '));
    }

    public function edit($id)
    {
        $data['State'] = resolve('StateService')->find($id);
        return view('states.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $State = resolve('StateService')->update($input);
        return redirect()
            ->route('states.edit', ['id' => $State->id])
            ->with('status', __('state.update.successfully '));
    }

    public function destroy($id)
    {
        $State = resolve('StateService')->destroy($id);
        return redirect()
            ->route('states.edit', ['id' => $id])
            ->with('status', __('state.destroy.successfully '));
    }

    public function json(Request $request)
    {
        $all = $request->all();
        $data = resolve('StateService')->where($all)->get();
        return StateResource::collection($data);
    }
}
