<div class="form-group">
    <label class="control-label">
        {{ __('location::countries.regions.country') }}
        <span class="required"> * </span>
    </label>
    {!! Form::select('country_id', $countries, isset($region)? $region->country_id : null, ['class' => 'form-control', 'placeholder' => 'Escolha o país', 'required' ]) !!}
</div>

<div class="form-group">
    <label class="control-label">
        {{ __('location::countries.regions.name') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('name', isset($country)? $country->name : null, ['class' => 'form-control', 'placeholder' => 'Nome da região do país', 'required' ]) !!}
</div>

@includeIf('location::partials.buttons_form', ['nameRoute' => 'countries'])
