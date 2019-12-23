<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ __('states.list') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-section">
            <div class="kt-section__content">

                <table class="table table-striped table-hover" id="states_datatable">
                    <thead>
                        <tr>
                            <th>{{ __('states.name') }}</th>
                            <th>{{ __('states.country') }}</th>
                            <th>{{ __('states.country.region') }}</th>
                            <th>{{ __('states.code') }}</th>
                            <th>{{ __('states.meso.regions.count') }}</th>
                            <th>{{ __('states.cities.count') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($states as $obj)
                            <tr>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->country->name }}</td>
                                <td>{{ $obj->countryRegion->name }}</td>
                                <td>{{ $obj->code }}</td>
                                <td>{{ $obj->mesoRegions->count() }}</td>
                                <td>{{ $obj->cities->count() }}</td>
                                <td>
                                    @if (Route::current()->getName() != 'addresses.states.trashed')
                                        @datatableActions(['obj' => $obj, 'slug' => 'addresses.states'])
                                        Botões de states
                                        @enddatatableActions
                                    @else
                                        Deletado em @datetime($obj->deleted_at)
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#states_datatable').DataTable();
        });
    </script>
@endpush
