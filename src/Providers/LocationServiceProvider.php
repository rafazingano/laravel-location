<?php

namespace ConfrariaWeb\Location\Providers;

use ConfrariaWeb\Location\Commands\CheckPackage;
use ConfrariaWeb\Location\Contracts\AddressContract;
use ConfrariaWeb\Location\Contracts\StreetContract;
use ConfrariaWeb\Location\Contracts\CityContract;
use ConfrariaWeb\Location\Contracts\CityRegionContract;
use ConfrariaWeb\Location\Contracts\CountryContract;
use ConfrariaWeb\Location\Contracts\CountryRegionContract;
use ConfrariaWeb\Location\Contracts\NeighborhoodContract;
use ConfrariaWeb\Location\Contracts\StateContract;
use ConfrariaWeb\Location\Repositories\AddressRepository;
use ConfrariaWeb\Location\Repositories\StreetRepository;
use ConfrariaWeb\Location\Repositories\CityRegionRepository;
use ConfrariaWeb\Location\Repositories\CityRepository;
use ConfrariaWeb\Location\Repositories\CountryRegionRepository;
use ConfrariaWeb\Location\Repositories\CountryRepository;
use ConfrariaWeb\Location\Repositories\NeighborhoodRepository;
use ConfrariaWeb\Location\Repositories\StateRepository;
use ConfrariaWeb\Location\Services\AddressService;
use ConfrariaWeb\Location\Services\StreetService;
use ConfrariaWeb\Location\Services\CityRegionService;
use ConfrariaWeb\Location\Services\CityService;
use ConfrariaWeb\Location\Services\CountryRegionService;
use ConfrariaWeb\Location\Services\CountryService;
use ConfrariaWeb\Location\Services\NeighborhoodService;
use ConfrariaWeb\Location\Services\StateService;

use Collective\Html\FormFacade as Form;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                CheckPackage::class
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', 'location');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'location');
        $this->publishes([__DIR__ . '/../../config/cw_location.php' => config_path('cw_location.php')], 'cw_location');

        Form::component('address', 'location::components.forms.address', ['name' => 'address', 'value' => [], 'attributes' => []]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryContract::class, CountryRepository::class);
        $this->app->bind('CountryService', function ($app) {
            return new CountryService($app->make(CountryContract::class));
        });

        $this->app->bind(CountryRegionContract::class, CountryRegionRepository::class);
        $this->app->bind('CountryRegionService', function ($app) {
            return new CountryRegionService($app->make(CountryRegionContract::class));
        });

        $this->app->bind(StateContract::class, StateRepository::class);
        $this->app->bind('StateService', function ($app) {
            return new StateService($app->make(StateContract::class));
        });

        $this->app->bind(CityContract::class, CityRepository::class);
        $this->app->bind('CityService', function ($app) {
            return new CityService($app->make(CityContract::class));
        });

        $this->app->bind(CityRegionContract::class, CityRegionRepository::class);
        $this->app->bind('CityRegionService', function ($app) {
            return new CityRegionService($app->make(CityRegionContract::class));
        });

        $this->app->bind(NeighborhoodContract::class, NeighborhoodRepository::class);
        $this->app->bind('NeighborhoodService', function ($app) {
            return new NeighborhoodService($app->make(NeighborhoodContract::class));
        });

        $this->app->bind(StreetContract::class, StreetRepository::class);
        $this->app->bind('StreetService', function ($app) {
            return new StreetService($app->make(StreetContract::class));
        });

        $this->app->bind(AddressContract::class, AddressRepository::class);
        $this->app->bind('AddressService', function ($app) {
            return new AddressService(
                $app->make(CountryContract::class),
                $app->make(StateContract::class),
                $app->make(CityContract::class),
                $app->make(NeighborhoodContract::class),
                $app->make(StreetContract::class),
                $app->make(AddressContract::class)
            );
        });

    }

}
