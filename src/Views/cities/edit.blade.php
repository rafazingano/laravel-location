@extends(config('cw_address.layout'))
@section('title', __('location::cities.cities'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::cities.edit', ['name' => $city->name]) }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'cities'])
                    </div>
                    <div class="card-body">
                        {!! Form::model($city, ['route' => ['admin.locations.cities.update', $city->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                            @include('location::cities.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
