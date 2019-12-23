@extends(config('cw_address.layout'))
@section('title', __('location::neighborhoods.neighborhoods'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::neighborhoods.edit', ['name' => $neighborhood->name]) }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'neighborhoods'])
                    </div>
                    <div class="card-body">
                        {!! Form::model($neighborhood, ['route' => ['admin.locations.neighborhoods.update', $neighborhood->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                            @include('location::neighborhoods.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
