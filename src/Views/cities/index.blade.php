@extends(config('cw_location.layout'))
@section('title', trans('location::cities.cities'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::cities.list') }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'cities'])
                    </div>
                    <div class="card-body">
                        @include('location::cities.partials.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
