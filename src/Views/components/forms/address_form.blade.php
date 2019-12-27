<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.cep') }}</label>
        {!! Form::text('sync[address][postal_code]', NULL, ['data-mask' => config('erp.address.postal_code_mask'), 'id' => 'postal_code', 'data-autocomplete' => 'true', 'class' => 'form-control', 'placeholder' => 'CEP']) !!}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.country') }}</label>
        {{ Form::select('sync[address][country_id]', [], NULL, ['id' => 'country', 'data-default' => config('erp.address.default.country'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.state') }}</label>
        {{ Form::select('sync[address][state_id]', [], NULL, ['id' => 'state', 'data-default' => config('erp.address.default.state'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class=form-label">{{ __('location::address.city') }}</label>
        {{ Form::select('sync[address][city_id]', [], NULL, ['id' => 'city', 'class' => 'form-control']) }}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.neighborhood') }}</label>
        {!! Form::text('sync[address][neighborhood]', NULL, ['id' => 'neighborhood', 'class' => 'form-control', 'placeholder' => 'Bairro']) !!}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.street') }}</label>
        {!! Form::text('sync[address][street]', NULL, ['id' => 'street', 'class' => 'form-control', 'placeholder' => 'Rua']) !!}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.number') }}</label>
        {!! Form::text('sync[address][number]', NULL, ['id' => 'number', 'class' => 'form-control', 'placeholder' => 'Numero']) !!}
    </div>
</div>

<div class="col-12">
    <div class="form-group ">
        <label class="form-label">{{ __('location::address.complement') }}</label>
        {!! Form::text('sync[address][complement]', NULL, ['id' => 'complement', 'class' => 'form-control', 'placeholder' => 'Complemento']) !!}
    </div>
</div>

@if(isset($obj->options))
    @foreach($obj->options as $option)
        <div class="col-lg-6 col-xl-6">
            {!! option_input($obj, $option) !!}
        </div>
    @endforeach
@endif

@push('scripts')
    <script>
        function country(country) {
            $.ajax({
                type: "get",
                url: "{{ url('api/addresses/countries/json?api_token=' . auth()->user()->api_token) }}",
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                success: function (obj) {
                    if (obj != null) {
                        var data = obj.data;
                        var selectbox = $('#country');
                        selectbox.find('option').remove();
                        $.each(data, function (i, d) {
                            if (country == d.name) {
                                $('<option>').attr('selected', 'selected').val(d.id).text(d.name).appendTo(selectbox);
                            } else {
                                $('<option>').val(d.id).text(d.name).appendTo(selectbox);
                            }
                        });
                    }
                }
            });
        }

        function state(country, state_code) {
            $.ajax({
                type: "get",
                url: "{{ url('api/addresses/states/json?api_token=' . auth()->user()->api_token) }}",
                data: {country: country},
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                success: function (obj) {
                    if (obj != null) {
                        var data = obj.data;
                        var selectbox = $('#state');
                        selectbox.find('option').remove();
                        $.each(data, function (i, d) {
                            if (state_code == d.code) {
                                $('<option>').attr('selected', 'selected').val(d.id).text(d.code).appendTo(selectbox);
                            } else {
                                $('<option>').val(d.id).text(d.code).appendTo(selectbox);
                            }
                        });
                    }
                }
            });
        }

        function city(state_code, city) {
            console.log(state);
            $.ajax({
                type: "get",
                url: "{{ url('api/addresses/cities/json?api_token=' . auth()->user()->api_token) }}",
                data: {state_code: state_code},
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                success: function (obj) {
                    if (obj != null) {
                        var data = obj.data;
                        var selectbox = $('#city');
                        selectbox.find('option').remove();
                        $.each(data, function (i, d) {
                            if (city == d.name) {
                                $('<option>').attr('selected', 'selected').val(d.id).text(d.name).appendTo(selectbox);
                            } else {
                                $('<option>').val(d.id).text(d.name).appendTo(selectbox);
                            }
                        });
                    }
                }
            });
        }

        function neighborhood(neighborhood) {
            var input = $('#neighborhood');
            input.val(neighborhood);
        }

        function street(street) {
            var input = $('#street');
            input.val(street);
        }

        function number(number) {
            var input = $('#number');
            input.val(number);
        }

        function complement(complement) {
            var input = $('#complement');
            input.val(complement);
        }

        function postal_code(postal_code) {
            var input = $('#postal_code');
            input.val(postal_code);
        }

        $.fn.findAddressByCep = function () {
            var input = $(this);
            var settings = $.extend({
                'onBlur': function () {
                    $('#street').val('loading...');
                    $('#neighborhood').val('loading...');
                    var postal_code = input.val().toString().replace('-', '');
                    $.getJSON("https://viacep.com.br/ws/" + postal_code + "/json/?callback=?", function (dados) {
                        if (!("erro" in dados)) {
                            country('Brasil');
                            state('Brasil', dados.uf);
                            city(dados.uf, dados.localidade);
                            neighborhood(dados.bairro);
                            street(dados.logradouro);
                            $('#number').focus();
                        } else {
                            console.log("CEP não encontrado.");
                        }
                    });

                }
            });
            input.blur(function () {
                settings.onBlur(input.val());
            });
        }

        $(document).ready(function () {
            postal_code("{{ $obj->postal_code ?? '' }}")
            country('Brasil');
            state('Brasil', "{{ $obj->city->state->code ?? '' }}");
            city("{{ $obj->city->state->code ?? '' }}", "{{ isset($obj->city)? $obj->city->name : '' }}");
            neighborhood("{{ $obj->neighborhood->name ?? '' }}");
            street("{{ $obj->street->name ?? '' }}");
            number("{{ $obj->number ?? '' }}");
            complement("{{ isset($obj->complement)? $obj->complement->implode(', ') : '' }}");

            var cmp_postal_code = $('#postal_code');
            cmp_postal_code.findAddressByCep();

            $("#country").change(function() {
                state($("option:selected", this).text(), "");
            });

            $("#state").change(function() {
                city($("option:selected", this).text(), "");
            });

        });
    </script>
@endpush
