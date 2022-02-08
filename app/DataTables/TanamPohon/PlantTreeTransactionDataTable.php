<?php

namespace App\DataTables\TanamPohon;

use App\Models\PlantTreeTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use function App\Http\Helpers\integerToRupiah;
use function App\Http\Helpers\tanamPohohCalculateTotalPrice;

class PlantTreeTransactionDataTable extends DataTable
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
            ->addColumn('user_name', fn ($d) => "{$d->user->name}")
            ->addColumn('status', 'layouts.crud.status-transaction-badge')
            ->addColumn('species_name', fn ($d) => "{$d->treeCatalog->treeSpecies->local_name} ({$d->treeCatalog->treeSpecies->scientific_name})")
            ->addColumn('plant_location', fn ($d) => "{$d->treeCatalog->plantLocation->name}")
            ->addColumn('total_price', function ($d) {
                $price = tanamPohohCalculateTotalPrice($d);
                return integerToRupiah($price);
            })
            ->editColumn('created_at', function ($d) {
                return $d->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('action', 'layouts.crud.show-action')
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PlantTreeTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PlantTreeTransaction $model)
    {
        return PlantTreeTransaction::with(['user', 'paymentMethod', 'paymentStatus', 'treeCatalog']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->parameters([
                "responsive" => true
            ])
            ->setTableId('planttreetransaction-table')
            ->setTableAttribute('class','table table-borderless table-hover')
            ->setTableAttribute('width', '100%')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('frtip')
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
            Column::make('code')->title('Order #')->searchable(true)->orderable(false),
            Column::make('created_at')->searchable(false)->orderable(false),
            Column::make('user_name')->searchable(false)->orderable(false),
            Column::make('species_name')->searchable(false)->orderable(false),
            Column::make('plant_location')->searchable(false)->orderable(false),
            Column::make('quantity')->title('Qty')->searchable(false)->orderable(false),
            Column::computed('status')->searchable(false)->orderable(false)->addClass('text-center'),
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
        return 'PlantTreeTransaction_' . date('YmdHis');
    }
}
