<?php

namespace ConfrariaWeb\Location\DataTables;

use ConfrariaWeb\Location\Models\City;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CityDataTable extends DataTable
{
    protected $actions = ['print', 'csv', 'excel', 'pdf'];

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->startsWithSearch()
            ->addColumn('count_addresses', function ($row) {
                return $row->addresses->count();
            })
            ->addColumn('action', function ($row) {
                return view('location::partials.buttons_datatable', ['obj' => $row, 'nameRoute' => 'admin.locations.cities'])->render();
            });
    }

    public function query(City $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('city-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->addAction(['width' => '80px'])
            ->parameters([
                "dom" => "Bfrtip",
                "buttons" => $this->actions,
                "language" => [
                    "url" => url('//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json')
                ]
            ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('count_addresses')
        ];
    }

    protected function filename()
    {
        return 'City_' . date('YmdHis');
    }
}
