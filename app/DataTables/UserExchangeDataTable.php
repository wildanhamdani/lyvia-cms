<?php

namespace App\DataTables;

use App\UserExchange;
use Yajra\DataTables\Services\DataTable;

class UserExchangeDataTable extends DataTable
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
                return '<a href="userexchange/' . $query->UserExchangeID . '/edit" class="btn btn-xs bg-navy"><i class="glyphicon glyphicon-edit"></i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserExchange $model)
    {
        return $model->newQuery()
            ->select('UserExchangeID',
                'UserID',
                'ExchangeID',
                'Username',
                'APIKey',
                'APISecret',
                'Passphrase',
                'CreatedBy',
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
            'UserExchangeID',
            'UserID',
            'ExchangeID',
            'Username',
            'APIKey',
            'APISecret',
            'Passphrase',
            'CreatedBy',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'UserExchange_' . date('YmdHis');
    }
}
