<?php

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Location\Controllers')
    ->group(function () {

        Route::prefix('locations')
            ->name('locations.')
            ->group(function () {

                Route::prefix('countries')
                    ->name('countries.')
                    ->group(function () {
                        Route::get('regions/trashed', 'CountryRegionController@trashed')->name('regions.trashed');
                        Route::resource('regions', 'CountryRegionController');
                        Route::get('trashed', 'CountryController@trashed')->name('trashed');
                    });
                Route::resource('countries', 'CountryController');

                Route::prefix('states')
                    ->name('states.')
                    ->group(function () {
                        Route::prefix('regions')
                            ->name('regions.')
                            ->group(function () {
                                Route::get('trashed', 'CityRegionController@trashed')->name('trashed');
                                Route::get('micro/trashed', 'StateRegionMicroController@trashed')->name('micro.trashed');
                                Route::resource('micro', 'StateRegionMicroController');
                                Route::get('meso/trashed', 'StateRegionMesoController@trashed')->name('meso.trashed');
                                Route::resource('meso', 'StateRegionMesoController');
                            });
                        Route::resource('regions', 'CityRegionController');
                        Route::get('trashed', 'StateController@trashed')->name('trashed');
                    });
                Route::resource('states', 'StateController');

                Route::prefix('cities')
                    ->name('cities.')
                    ->group(function () {
                        Route::prefix('regions')
                            ->name('regions.')
                            ->group(function () {
                                Route::get('trashed', 'CityRegionController@trashed')->name('trashed');
                            });
                        Route::resource('regions', 'CityRegionController');
                        Route::get('trashed', 'CityController@trashed')->name('trashed');
                    });
                Route::resource('cities', 'CityController');

                Route::prefix('neighborhoods')
                    ->name('neighborhoods.')
                    ->group(function () {
                        Route::get('trashed', 'NeighborhoodController@trashed')->name('trashed');
                    });
                Route::resource('neighborhoods', 'NeighborhoodController');

                Route::prefix('addresses')
                    ->name('addresses.')
                    ->group(function () {
                        Route::get('trashed', 'AddressController@trashed')->name('trashed');
                    });
                Route::resource('addresses', 'AddressController');

                Route::prefix('streets')
                    ->name('streets.')
                    ->group(function () {
                        Route::get('trashed', 'StreetController@trashed')->name('trashed');
                    });
                Route::resource('streets', 'StreetController');

            });
    });
