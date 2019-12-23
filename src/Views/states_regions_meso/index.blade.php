@extends(config('cw_address.layout'))
@section('title', trans('location::countries.countries'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left">
                            {{ __($title ?? 'location::countries.list') }}
                        </h3>
                        @includeIf('location::partials.card_header_pills', ['nameRoute' => 'countries'])
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
