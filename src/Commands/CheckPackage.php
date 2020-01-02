<?php

namespace ConfrariaWeb\Location\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CheckPackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'location:check-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check important things about the package';

    protected $tables = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->tables = [
            'location_countries' => [
                'id',
                'name',
                'code_phone',
                'lang'
            ],
            'location_country_regions' => [
                'id',
                'country_id',
                'name'
            ],
            'location_states' => [
                'id',
                'country_id',
                'country_region_id',
                'code',
                'name',

            ],
            'location_state_meso_regions' => [
                'id',
                'state_id',
                'name'
            ],
            'location_state_micro_regions' => [
                'id',
                'state_meso_region_id',
                'name'
            ],
            'location_cities' => [
                'id',
                'state_id',
                'state_micro_region_id',
                'name'
            ],
            'location_city_regions' => [
                'id',
                'city_id',
                'name'
            ],
            'location_neighborhoods' => [
                'id',
                'name'
            ],
            'location_streets' => [
                'id',
                'name'
            ],
            'location_addresses' => [
                'id',
                'city_id',
                'city_region_id',
                'neighborhood_id',
                'street_id',
                'addressable_id',
                'addressable_type',
                'number',
                'complement',
                'postal_code'
            ]
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('<fg=red;bg=yellow>Importante:</>');
        $this->info('<fg=blue>Se precisar criar tabelas e/ou colunas verifiuqe em migrations qual o formato correto de criação de cada uma</>');

        foreach ($this->tables as $table => $columns) {
            $this->checkAndCreateTable($table);
            foreach ($columns as $column) {
                $this->checkAndCreateColumn($table, $column);
            }
        }
    }

    private function checkAndCreateTable($table)
    {
        if (!Schema::hasTable($table)) {
            $this->info('<fg=red;bg=yellow># ' . $table . ' não existe</>');
        }
    }

    private function checkAndCreateColumn($table, $column)
    {
        if (!Schema::hasColumn($table, $column)) {
            $this->info('### <fg=yellow;bg=red>' . $column . '</> na tabela ' . $table . ' não existe');
        }
    }
}
