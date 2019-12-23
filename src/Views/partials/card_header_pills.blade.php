<div class="btn-group float-right btn-group-sm" role="group" aria-label="">
    <a class=" btn btn-sm btn-primary" href="{{ route('admin.locations' . (isset($nameRoute)? '.' . $nameRoute : '')  . '.create') }}">
        {{ trans('location::' . $nameRoute . '.create') }}
    </a>
    <a class=" btn btn-sm btn-secondary" href="{{ route('admin.locations.addresses.index') }}">
        {{ trans('location::general.adresses') }}
    </a>
    <a class=" btn btn-sm btn-secondary" href="{{ route('admin.locations.neighborhoods.index') }}">
        {{ trans('location::general.neighborhoods') }}
    </a>
    <a class=" btn btn-sm btn-secondary" href="{{ route('admin.locations.cities.index') }}">
        {{ trans('location::general.cities') }}
    </a>
    <a class=" btn btn-sm btn-secondary" href="{{ route('admin.locations.states.index') }}">
        {{ trans('location::general.states') }}
    </a>
    <a class=" btn btn-sm btn-secondary" href="{{ route('admin.locations.countries.index') }}">
        {{ trans('location::general.countries') }}
    </a>
</div>
