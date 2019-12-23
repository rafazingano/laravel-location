@extends('layouts.metronic')
@section('title', __('states'))
@section('content')
    @include('partials.kt_subheader', ['breadcrumb' => $breadcrumb, 'buttons' => $buttons])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-12">
                @include('states.partials.list')
            </div>
        </div>
    </div>
@endsection
@include('states.partials.kt_aside')
