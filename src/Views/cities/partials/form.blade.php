<div class="form-group">
    <label class="control-label">
        {{ __('location::addresses.country') }}
        <span class="required">*</span>
    </label>
    {{ Form::select2('country_id', isset($city)? $city->state->country->pluck('name', 'id') : [], isset($city)? $city->state->country->id : null, ['id' => 'country', 'class' => 'form-control', 'placeholder' => 'Selecione um país'], ['server_side' => ['route' => 'api.locations.countries']]) }}
</div>

<div class="form-group">
    <label class="control-label">
        {{ __('location::addresses.state') }}
        <span class="required">*</span>
    </label>
    {{ Form::select2('state_id', isset($city)? $city->state->pluck('name', 'id') : [], isset($city)? $city->state->city_id : null, ['id' => 'state', 'class' => 'form-control', 'placeholder' => 'Selecione um estado'], ['server_side' => ['route' => 'api.locations.states'], 'getValues' => ['country_id' => '#country']]) }}
</div>

<div class="form-group">
    <label class="control-label">
        {{ __('location::cities.name') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('name', isset($city)? $city->name : null, ['class' => 'form-control', 'placeholder' => 'Nome da cidade', 'required' ]) !!}
</div>

@includeIf('location::partials.buttons_form', ['nameRoute' => 'cities'])
