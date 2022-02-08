<?php

namespace App\DataTables\TanamPohon;

use App\Models\Tree;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class TreeInventoryDataTable extends DataTable
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
            ->addColumn('species_name', fn ($d) => "{$d->treeSpecies->local_name} ({$d->treeSpecies->scientific_name})")
            ->addColumn('plant_location', fn ($d) => "{$d->plantLocation->name}")
            ->addColumn('coordinate', fn ($d) => "{$d->lat}, {$d->lon}")
            ->editColumn('planting_date', fn ($d) => "{$d->planting_date->format('d-m-Y')}")
            ->addColumn('action', 'layouts.crud.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tree $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tree $model)
    {
        return Tree::with(['plantLocation', 'treeSpecies']);
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
            ->setTableAttribute('class', 'table table-borderless table-hover')
            ->setTableId('treeinventory-table')
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
            Column::make('tree_id'),
            Column::make('species_name')
                ->name('treeSpecies.local_name'),
            Column::make('plant_location')
                ->name('plantLocation.name'),
            Column::make('planting_date'),
            Column::make('coordinate')->title('Coordinate')->searchable(false)->orderable(false),

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
        return 'TreeInventory_' . date('YmdHis');
    }
}
