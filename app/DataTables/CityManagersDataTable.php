<?php

namespace App\DataTables;

use App\Models\Manager;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CityManagersDataTable extends DataTable
{
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
            ->addColumn('action', 'citymanagersdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Manager $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Manager $model)
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
            ->setTableId('datatable')
            ->selectAddClassName("table")
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make(''),
            Column::make('#'),
            Column::make('name'),
            Column::make('email'),
            Column::make('national_id'),
            Column::make('gender'),
            Column::make('birth_date'),
            Column::make('city'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CityManagers_' . date('YmdHis');
    }
}
