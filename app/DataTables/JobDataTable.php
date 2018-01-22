<?php

namespace App\DataTables;

use App\Job;
use Yajra\DataTables\Services\DataTable;

class JobDataTable extends DataTable
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
                return '<a href="job/' . $query->JobID . '/edit" class="btn btn-xs bg-navy"><i class="glyphicon glyphicon-edit"></i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Job $model)
    {
        return $model->newQuery()
            ->select('JobID',
                'UserExchangeID',
                'Name',
                'Buying_Username',
                'Selling_Username',
                'Buying_Currency',
                'Selling_Currency',
                'Buying_Symbol',
                'Selling_Symbol',
                'Base_Currency',
                'Transaction_Block',
                'Transaction_Amount',
                'Spread_Target',
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
            'JobID',
            'UserExchangeID',
            'Name',
            'Buying_Username',
            'Selling_Username',
            'Buying_Currency',
            'Selling_Currency',
            'Buying_Symbol',
            'Selling_Symbol',
            'Base_Currency',
            'Transaction_Block',
            'Transaction_Amount',
            'Spread_Target',
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
        return 'Job_' . date('YmdHis');
    }
}
