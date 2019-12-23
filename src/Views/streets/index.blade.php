@extends('layouts.metronic')
@section('title', __('addresses'))
@section('content')
    @include('partials.kt_subheader', ['breadcrumb' => $breadcrumb, 'buttons' => $buttons])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-12">
                @datatable($datatable)
                @slot('title')
                    {{ $title ?? __('addresses.list') }}
                @endslot
                @enddatatable
            </div>
        </div>
    </div>
@endsection
@include('addresses.partials.kt_aside')
