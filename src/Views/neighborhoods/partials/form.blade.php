<div class="form-group">
    <label class="control-label">
        {{ __('location::neighborhoods.name') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('name', isset($neighborhood)? $neighborhood->name : null, ['class' => 'form-control', 'placeholder' => 'Nome do Bairro', 'required' ]) !!}
</div>
@includeIf('location::partials.buttons_form', ['nameRoute' => 'countries'])
