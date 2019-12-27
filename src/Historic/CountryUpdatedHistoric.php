<?php

namespace ConfrariaWeb\Location\Historics;

use ConfrariaWeb\Location\Models\Country;
use ConfrariaWeb\Historic\Contracts\HistoricContract;

class CountryUpdatedHistoric implements HistoricContract
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function data()
    {
        return [
            'action' => 'updated',
            'content' => 'País ' . $this->country->name . ' foi atualizado com sucesso'
        ];
    }

    public function title()
    {
        return 'País atualizada';
    }

    public function user($collunn = null)
    {
        if ($collunn == 'id') {
            return auth()->id();
        }
        return auth()->user();
    }
}
