<?php

namespace App\DataTables\TanamPohon;

use App\Models\TreeSpecies;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TreeSpeciesDataTable extends DataTable
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
            ->addColumn('action', 'layouts.crud.action');
    }

    /**
     * Get query source of dataTable.
     *

     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TreeSpecies $model)
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
            ->setTableAttribute('width', '100%')
            ->parameters([
                "responsive" => true
            ])
            ->setTableAttribute('class','table table-borderless ')
            ->setTableId('tanampohontreespecies-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('frtip');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [


            Column::make('local_name'),
            Column::make('scientific_name'),
            Column::make('sequestration'),
            Column::make('max_height'),
            Column::make('max_crown_width'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TanamPohon/TreeSpecies_' . date('YmdHis');
    }
}
