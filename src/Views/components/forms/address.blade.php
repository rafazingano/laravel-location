<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('country') }}
            <span class="required">*</span>
        </label>
        {{ Form::select2(isset($name)? $name . '[country_id]' : 'country_id', isset($address)? $address->country->pluck('name', 'id') : [], isset($address)? $address->country->city_id : null, ['id' => 'country', 'class' => 'form-control', 'placeholder' => 'Selecione um país'], ['server_side' => ['route' => 'api.locations.countries']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('state') }}
            <span class="required">*</span>
        </label>
        {{ Form::select2(isset($name)? $name . '[state_id]' : 'state_id', isset($address)? $address->state->pluck('name', 'id') : [], isset($address)? $address->state->city_id : null, ['id' => 'state', 'class' => 'form-control', 'placeholder' => 'Selecione um estado'], ['server_side' => ['route' => 'api.locations.states'], 'getValues' => ['country_id' => '#country']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('city') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[city_id]' : 'city_id', isset($address)? $address->city->pluck('name', 'id') : [], isset($address)? $address->city_id : null, ['id' => 'city', 'class' => 'form-control', 'placeholder' => 'Selecione uma cidade'], ['server_side' => ['route' => 'api.locations.cities'], 'getValues' => ['state_id' => '#state']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('neighborhood') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[neighborhood_id]' : 'neighborhood_id', isset($address)? $address->neighborhood->pluck('name', 'id') : [], isset($address)? $address->neighborhood_id : null, ['id' => 'neighborhood', 'class' => 'form-control', 'placeholder' => 'Selecione um bairro'], ['server_side' => ['route' => 'api.locations.neighborhoods']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('street') }}
            <span class="required"> * </span>
        </label>
        {{ Form::select2(isset($name)? $name . '[street_id]' : 'street_id', isset($address)? $address->street->pluck('name', 'id') : [], isset($address)? $address->street_id : null, ['id' => 'street', 'class' => 'form-control', 'placeholder' => 'Selecione uma rua'], ['server_side' => ['route' => 'api.locations.streets']]) }}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('postal_code') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[postal_code]' : 'postal_code', isset($address)? $address->postal_code : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome de display do perfil', 'required', 'data-mask' => config('address.postal_code_mask') ]) !!}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('number') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[number]' : 'number', isset($address)? $address->number : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label class="control-label">
            {{ __('complement') }} <span class="required"> * </span>
        </label>
        {!! Form::text(isset($name)? $name . '[complement]' : 'complement', isset($address)? $address->complement : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
    </div>
</div>
