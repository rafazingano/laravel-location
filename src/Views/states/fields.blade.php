<div class="form-group col-md-2">
    <label for="postal_code" class="control-label">{{ trans('Location::addresses.fields.postal_code') }}</label>
    <input id="postal_code" name="postal_code" data-autocomplete="true"
           data-mask="{{ config('address.postal_code_mask') }}" type="text" class="form-control"
           value="{{ old('postal_code') }}">
</div>

<div class="form-group col-md-3">
    <label for="street" class="control-label">{{ trans('Location::addresses.fields.street') }}</label>
    <input id="street" name="street" type="text" class="form-control" value="{{ old('street') }}">
</div>

<div class="form-group col-md-1">
    <label for="number" class="control-label">{{ trans('Location::addresses.fields.number') }}</label>
    <input id="number" name="number" type="text" class="form-control" value="{{ old('number') }}">
</div>

<div class="form-group col-md-4">
    <label for="district" class="control-label">{{ trans('Location::addresses.fields.district') }}</label>
    <input id="district" name="district" type="text" class="form-control" value="{{ old('district') }}">
</div>

<div class="form-group col-md-2">
    <label for="complement" class="control-label">{{ trans('Location::addresses.fields.complement') }}</label>
    <input id="complement" name="complement" type="text" class="form-control" value="{{ old('complement') }}">
</div>

<div class="form-group col-md-2">
    <label for="name" class="control-label">{{ trans('Location::addresses.fields.name') }}</label>
    <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
</div>

<div class="form-group col-md-2">
    <label for="country_id" class="control-label">{{ trans('Location::addresses.fields.country') }}*</label>
    <select name="country_id" id="country" class="form-control" data-default="{{ config('address.default-country') }}"
            required></select>
</div>
<div class="form-group col-md-2">
    <label for="state_id" class="control-label">{{ trans('Location::addresses.fields.state') }}*</label>
    <select name="state_id" id="state" data-default="{{ config('address.default-state') }}" class="form-control state"
            required></select>
</div>
<div class="form-group col-md-2">
    <label for="city_id" class="control-label">{{ trans('Location::addresses.fields.city') }}*</label>
    <select name="city_id" id="city" data-default="{{ config('address.default-city') }}" class="form-control state"
            required></select>
</div>
