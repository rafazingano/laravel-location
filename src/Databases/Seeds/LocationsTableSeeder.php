<?php
namespace ConfrariaWeb\Location\Databases\Seeds;

use Illuminate\Database\Seeder;
use ConfrariaWeb\Location\Models\City;
use ConfrariaWeb\Location\Models\Country;
use ConfrariaWeb\Location\Models\CountryRegion;
use ConfrariaWeb\Location\Models\State;
use ConfrariaWeb\Location\Models\StateMesoRegion;
use ConfrariaWeb\Location\Models\StateMicroRegion;

class LocationsTableSeeder extends Seeder
{

    public function run()
    {
        $json = $this->lists("https://servicodados.ibge.gov.br/api/v1/localidades/municipios");
        $country = Country::firstOrCreate(['name' => 'Brasil', 'code_phone' => '+55', 'lang' => 'pt-br']);
        foreach ($json as $address) {
            $countryRegion = CountryRegion::firstOrCreate(
                [
                    'name' => $address['microrregiao']['mesorregiao']['UF']['regiao']['nome'],
                    'country_id' => $country->id
                ]
            );

            $state = State::firstOrCreate(
                [
                    'name' => $address['microrregiao']['mesorregiao']['UF']['nome'],
                    'country_id' => $country->id
                ],
                [
                    'country_region_id' => $countryRegion->id,
                    'code' => $address['microrregiao']['mesorregiao']['UF']['sigla']
                ]
            );

            $stateMesoRegion = StateMesoRegion::firstOrCreate(
                [
                    'name' => $address['microrregiao']['mesorregiao']['nome'],
                    'state_id' => $state->id
                ]
            );

            $stateMicroRegion = StateMicroRegion::firstOrCreate(
                [
                    'name' => $address['microrregiao']['nome'],
                    'state_meso_region_id' => $stateMesoRegion->id
                ]
            );

            $city = City::firstOrCreate(
                [
                    'name' => $address['nome'],
                    'state_id' => $state->id,
                    'state_micro_region_id' => $stateMicroRegion->id
                ]
            );
        }
    }

    private function lists($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
}
