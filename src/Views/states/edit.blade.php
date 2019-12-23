@extends(config('cw_location.layout'))
@section('title', __('location::states.cities'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::states.edit', ['name' => $state->name]) }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'states'])
                    </div>
                    <div class="card-body">
                        {!! Form::model($state, ['route' => ['admin.locations.states.update', $state->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                        @include('location::states.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
