<?php

namespace App\DataTables\TanamPohon;

use App\Models\PlantLocationType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PlantLocationTypeDataTable extends DataTable
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
     * @param \App\Models\TanamPohon/PlantLocationTypeController $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PlantLocationType $model)
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
            ->setTableId('tanampohon-plantlocationtypecontroller-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')

            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
       
            Column::make('id'),
            Column::make('name'),

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
        return 'TanamPohon/PlantLocationTypeController_' . date('YmdHis');
    }
}
