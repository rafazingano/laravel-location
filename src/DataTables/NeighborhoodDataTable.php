<?php

namespace ConfrariaWeb\Location\DataTables;

use ConfrariaWeb\Location\Models\Neighborhood;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NeighborhoodDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                return view('location::partials.buttons_datatable', ['obj' => $row, 'nameRoute' => 'admin.locations.neighborhoods'])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Neighborhood $model)
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
            ->setTableId('neighborhood-table')
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
            Column::make('name')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Neighborhood_' . date('YmdHis');
    }
}
