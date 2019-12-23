<table class="table table-striped table-hover" id="countries_datatable">
    <thead>
    <tr>
        <th>{{ trans('location::countries.name') }}</th>
        <th>{{ trans('location::countries.code_phone') }}</th>
        <th>{{ trans('location::countries.lang') }}</th>
    </tr>
    </thead>
</table>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#countries_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.locations.countries.getdatatable') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'code_phone', name: 'code_phone'},
                    {data: 'lang', name: 'lang'}
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@endpush
