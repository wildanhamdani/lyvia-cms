<?php

namespace App\DataTables;

use App\JobSession;
use App\User;
use Yajra\DataTables\Services\DataTable;

class JobSessionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JobSession $model)
    {
        return $model->newQuery()
            ->select('JobSessionID',
                'JobID',
                'HighestSpread',
                'LowestSpread',
                'Spread',
                'Total_BTC_Sold',
                'Total_Capital_Spent',
                'RunningIP',
                'Status',
                'StartedAt',
                'EndAt',
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
            'JobSessionID',
            'JobID',
            'HighestSpread',
            'LowestSpread',
            'Spread',
            'Total_BTC_Sold',
            'Total_Capital_Spent',
            'RunningIP',
            'Status',
            'StartedAt',
            'EndAt',
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
        return 'JobSession_' . date('YmdHis');
    }
}
