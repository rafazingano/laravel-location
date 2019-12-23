@extends('layouts.metronic')
@section('title', __('countries'))
@section('content')
    @include('partials.kt_subheader', [
      'breadcrumb' => [
        '#' => __('countries.create')
      ],
      'btns' => [
        route('countries.index') => [
          'label' => __('return'),
          'icon' => 'fa fa-plus'
        ]
      ]
    ])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'countries.store', 'class' => 'horizontal-form']) !!}
                @include('countries.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@include('countries.partials.kt_aside')

@push('styles')

@endpush

@push('scripts')
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('.kt-select2').select2();

            var t;
            t=KTUtil.isRTL()? {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            } : {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
            $('.kt_datepicker').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: !0,
                templates: t,
                format: 'dd/mm/yyyy',
                language: 'pt-BR'
            });
        });
    </script>
@endpush
