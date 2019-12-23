<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ __('states.form') }}
            </h3>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label class="control-label">{{ __('states.name') }} <span class="required"> * </span></label>
                    {!! Form::text('name', isset($state)? $state->name : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('country') }}</label>
                    {{ Form::select('country_id', $countries, isset($state)? $state->country_id : null, ['class' => 'form-control select2 kt-select2']) }}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('states.ibge') }} <span class="required"> * </span></label>
                    {!! Form::text('ibge', isset($state)? $state->ibge : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('states.code') }} <span class="required"> * </span></label>
                    {!! Form::text('code', isset($state)? $state->code : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

            </div>

        </div>
    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions float-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>

</div>
