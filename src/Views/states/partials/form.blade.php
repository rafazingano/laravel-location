<div class="form-group">
    <label class="control-label">
        {{ __('location::states.country') }}
        <span class="required">*</span>
    </label>
    {{ Form::select2('country_id', isset($state)? $state->country->pluck('name', 'id') : [], isset($state)? $state->country->id : null, ['id' => 'country', 'class' => 'form-control', 'placeholder' => 'Selecione um país'], ['server_side' => ['route' => 'api.locations.countries']]) }}
</div>

<div class="form-group">
    <label class="control-label">{{ __('location::states.name') }} <span class="required"> * </span></label>
    {!! Form::text('name', isset($state)? $state->name : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
</div>

<div class="form-group">
    <label class="control-label">{{ __('location::states.code') }} <span class="required"> * </span></label>
    {!! Form::text('code', isset($state)? $state->code : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
</div>
@includeIf('location::partials.buttons_form', ['nameRoute' => 'cities'])
