<?php
Route::middleware(['auth:api'])
    ->namespace('ConfrariaWeb\Location\Controllers')
    ->name('api.')
    ->prefix('api')
    ->group(function () {

        Route::name('locations.')
            ->prefix('locations')
            ->group(function () {

                Route::get('countries', 'CountryController@json')->name('countries');
                Route::get('countries/regions', 'CountryRegionController@json')->name('countries.regions');

                Route::get('states', 'StateController@json')->name('states');

                Route::get('cities', 'CityController@json')->name('cities');
                Route::get('cities/regions', 'CityRegionController@json')->name('cities.regions');

                Route::get('neighborhoods', 'NeighborhoodController@json')->name('neighborhoods');

                Route::get('streets', 'StreetController@json')->name('streets');
            });

    });
