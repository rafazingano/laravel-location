@extends(config('cw_address.layout'))
@section('title', __('location::cities.cities'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::cities.create') }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'cities'])
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.locations.cities.store', 'class' => 'horizontal-form']) !!}
                            @include('location::cities.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
