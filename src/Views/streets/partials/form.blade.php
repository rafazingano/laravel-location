<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ __('addresses.form') }}
            </h3>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.name') }} <span class="required"> * </span></label>
                    {!! Form::text('name', isset($address)? $address->name : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.city') }} <span class="required"> * </span></label>
                    {{ Form::select('city_id', $cities, isset($address)? $address->city_id : null, ['class' => 'form-control kt-select2']) }}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.postal_code') }} <span class="required"> * </span></label>
                    {!! Form::text('postal_code', isset($address)? $address->postal_code : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome de display do perfil', 'required', 'data-mask' => config('address.postal_code_mask') ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.street') }} <span class="required"> * </span></label>
                    {!! Form::text('street', isset($address)? $address->street : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.number') }} <span class="required"> * </span></label>
                    {!! Form::text('number', isset($address)? $address->number : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.district') }} <span class="required"> * </span></label>
                    {!! Form::text('district', isset($address)? $address->district : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
                </div>

                <div class="form-group">
                    <label class="control-label">{{ __('addresses.complement') }} <span class="required"> * </span></label>
                    {!! Form::text('complement', isset($address)? $address->complement : null, ['class' => 'form-control', 'placeholder' => '', 'required' ]) !!}
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
