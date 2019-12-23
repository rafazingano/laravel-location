<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ __('addresses.list') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-section">
            <div class="kt-section__content">

                <table class="table table-striped table-hover" id="addresses_datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('addresses.name') }}</th>
                            <th>{{ __('addresses.street') }}</th>
                            <th>{{ __('addresses.number') }}</th>
                            <th>{{ __('addresses.complement') }}</th>
                            <th>{{ __('addresses.district') }}</th>
                            <th>{{ __('addresses.postal_code') }}</th>
                            <th>{{ __('addresses.city') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addresses as $obj)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->street }}</td>
                                <td>{{ $obj->number }}</td>
                                <td>{{ $obj->complement }}</td>
                                <td>{{ $obj->district }}</td>
                                <td>{{ $obj->postal_code }}</td>
                                <td>{{ $obj->city->name }}/{{ $obj->city->state->code }}</td>
                                <td>
                                    <form action="{{ route('addresses.destroy',$obj->id) }}" method="POST">
                                        <div class="btn-group btn-group-sm">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <a href="{{ route('addresses.edit',[$obj->id]) }}">
                                                <button type="button" class="btn btn-sm btn-danger">{{ __('addresses.edit') }}</button>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-primary">{{ __('addresses.delete') }}</button>

                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
