<?php

namespace App\DataTables;

use App\Exchange;
use Yajra\DataTables\Services\DataTable;

class ExchangeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($query) {
                return '<a href="exchange/' . $query->ExchangeID . '/edit" class="btn btn-xs bg-navy"><i class="glyphicon glyphicon-edit"></i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Exchange $model)
    {
        return $model->newQuery()->select(
            'ExchangeID',
            'Name',
            'ModuleName',
            'created_at',
            'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'ExchangeID', 'Name', 'ModuleName', 'created_at', 'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Exchange_' . date('YmdHis');
    }
}
