<?php

namespace App\DataTables\TanamPohon;

use App\Models\PaymentConfirmation;
use Illuminate\View\View;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use function App\Http\Helpers\integerToRupiah;

class PaymentConfirmationDataTable extends DataTable
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
            ->addColumn('user_name',fn($d) => $d->transaction->user->name )
            ->addColumn('code',fn($d) => $d->transaction->code )
            ->addColumn('bank_account',fn($d) => $d->bankAccount->bank_name )
            ->editColumn('payment_total',fn($d) => integerToRupiah($d->payment_total) )
            ->editColumn('created_at',fn($d) => $d->created_at->format('d-m-Y H:i:s') )
            ->editColumn('payment_status', fn($d) =>  view('layouts.crud.status-transaction-badge', ['payment_status_id' => $d->transaction->payment_status_id])->render() )
            ->addColumn('action', 'layouts.crud.show-action')
            ->rawColumns(['action','payment_status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PaymentConfirmation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PaymentConfirmation $model)
    {
        return PaymentConfirmation::with(['bankAccount','transaction']);
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
            ->setTableId('paymentconfirmation-table')
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
           
            Column::make('created_at'),
            Column::make('user_name'),
            Column::make('code'),
            Column::make('bank_account'),
            Column::make('payment_total'),
            Column::make('payment_status')
            ->addClass('text-center'),
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
        return 'PaymentConfirmation_' . date('YmdHis');
    }
}
