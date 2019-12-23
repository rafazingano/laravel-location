<?php

namespace ConfrariaWeb\Location\DataTables;

use ConfrariaWeb\Location\Models\Address;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AddressDataTable extends DataTable
{
    protected $actions = ['print', 'csv', 'excel', 'pdf'];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->startsWithSearch()
            ->addColumn('city', function ($row) {
                return $row->city->name;
            })
            ->addColumn('city_region', function ($row) {
                return $row->cityRegion->name;
            })
            ->addColumn('neighborhood', function ($row) {
                return $row->Neighborhood->name;
            })
            ->addColumn('street', function ($row) {
                return $row->street->name;
            })
            ->addColumn('action', function ($row) {
                return view('location::partials.buttons_datatable', ['obj' => $row, 'nameRoute' => 'admin.locations'])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Address $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Address $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('address-table')
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('city'),
            Column::make('city_region'),
            Column::make('neighborhood'),
            Column::make('street'),
            Column::make('number'),
            Column::make('complement'),
            Column::make('postal_code'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Address_' . date('YmdHis');
    }
}
