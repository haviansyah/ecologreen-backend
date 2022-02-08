<?php

namespace App\DataTables\TanamPohon;

use App\Models\TreeCatalog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use function App\Http\Helpers\integerToRupiah;

class TreeCatalogDataTable extends DataTable
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
            ->editColumn('price', fn ($d) => integerToRupiah($d->price))
            ->editColumn('status', 'layouts.crud.status-badge')
            ->addColumn('action', 'layouts.crud.action')
            ->rawColumns(['status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TreeCatalog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TreeCatalog $model)
    {
        return TreeCatalog::with(['treeSpecies', 'plantLocation']);
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
            ->setTableAttribute('class','table table-borderless table-hover')
            ->setTableId('treecatalog-table')
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
            Column::make('species_name')
                ->name('treeSpecies.local_name'),
            Column::make('plant_location')
                ->name('plantLocation.name'),
            Column::make('price')
                ->name('price'),
            Column::make('status'),

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
        return 'TreeCatalog_' . date('YmdHis');
    }
}
