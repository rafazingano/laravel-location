<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('country') }}
            <span class="required">*</span>
        </label>
        {{ Form::select2(isset($name)? $name . '[country_id]' : 'location[country_id]', isset($value)? $value->city->state->country->pluck('name', 'id') : [], isset($value)? $value->city->state->country->id : null, ['id' => 'country', 'class' => 'form-control', 'placeholder' => 'Selecione um país'], ['server_side' => ['route' => 'api.locations.countries']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('state') }}
            <span class="required">*</span>
        </label>
        {{ Form::select2(isset($name)? $name . '[state_id]' : 'location[state_id]', isset($value)? $value->city->state->pluck('name', 'id') : [], isset($value)? $value->city->state->id : null, ['id' => 'state', 'class' => 'form-control', 'placeholder' => 'Selecione um estado'], ['server_side' => ['route' => 'api.locations.states'], 'getValues' => ['country_id' => '#country']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('city') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[city_id]' : 'location[city_id]', isset($value)? $value->city->pluck('name', 'id') : [], isset($value)? $value->city->id : null, ['id' => 'city', 'class' => 'form-control', 'placeholder' => 'Selecione uma cidade'], ['server_side' => ['route' => 'api.locations.cities'], 'getValues' => ['state_id' => '#state']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('neighborhood') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[neighborhood_id]' : 'location[neighborhood_id]', isset($value->neighborhood)? $value->neighborhood->pluck('name', 'id') : [], isset($value->neighborhood)? $value->neighborhood->id : null, ['id' => 'neighborhood', 'class' => 'form-control', 'placeholder' => 'Selecione um bairro'], ['server_side' => ['route' => 'api.locations.neighborhoods']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('street') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[street_id]' : 'location[street_id]', isset($value->street)? $value->street->pluck('name', 'id') : [], isset($value)? $value->street_id : null, ['id' => 'street', 'class' => 'form-control', 'placeholder' => 'Selecione uma rua'], ['server_side' => ['route' => 'api.locations.streets']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('postal_code') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[postal_code]' : 'location[postal_code]', isset($value)? $value->postal_code : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome de display do perfil', 'data-mask' => config('address.postal_code_mask') ]) !!}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('number') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[number]' : 'location[number]', isset($value)? $value->number : null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('complement') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[complement]' : 'location[complement]', isset($value)? $value->complement : null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
    </div>
</div>
