@extends(config('cw_location.layout'))
@section('title', trans('location::addresses.addresses'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::addresses.list') }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'addresses'])
                    </div>
                    <div class="card-body">
                        @include('location::addresses.partials.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
