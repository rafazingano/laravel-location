<?php

namespace ConfrariaWeb\Location\Historics;

use ConfrariaWeb\Location\Models\Country;
use ConfrariaWeb\Historic\Contracts\HistoricContract;

class CountryCreatedHistoric implements HistoricContract
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function data()
    {
        return [
            'action' => 'created',
            'content' => 'País ' . $this->country->name . ' foi criado com sucesso'
        ];
    }

    public function title()
    {
        return 'País criada';
    }

    public function user($collunn = null)
    {
        if ($collunn == 'id') {
            return auth()->id();
        }
        return auth()->user();
    }
}
