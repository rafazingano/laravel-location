<div class="form-group">
    <label class="control-label">
        {{ __('location::countries.name') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('name', isset($country)? $country->name : null, ['class' => 'form-control', 'placeholder' => 'Nome do país', 'required', 'maxlength' => '255']) !!}
</div>
<div class="form-group">
    <label class="control-label">
        {{ __('location::countries.code_phone') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('code_phone', isset($country)? $country->code_phone : null, ['class' => 'form-control', 'placeholder' => 'Exemplo: +55', 'required', 'maxlength' => '5']) !!}
</div>
<div class="form-group">
    <label class="control-label">
        {{ __('location::countries.lang') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('lang', isset($country)? $country->lang : null, ['class' => 'form-control', 'placeholder' => 'Exemplo: pt-br', 'required', 'maxlength' => '255']) !!}
</div>
@includeIf('location::partials.buttons_form', ['nameRoute' => 'countries'])
