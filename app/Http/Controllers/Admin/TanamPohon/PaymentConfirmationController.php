<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\PaymentConfirmationDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use Illuminate\Http\Request;

class PaymentConfirmationController extends BaseAdminController
{
    protected $model = PlantLocation::class;
    protected $view = 'tanam-pohon.payment-confirmation';
    protected $rule = [
        'name' => 'required',
    ];
    protected $route = 'payment-confirmation';

    public function index(PaymentConfirmationDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.payment-confirmation.index');
    }

    /** 
     * 
     * @method show() Store Transaction
     * GET api/tanam-pohon/confirmation/id
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var PaymentConfirmation */
        $paymentConfirmation = PaymentConfirmation::findOrFail($id);
        return redirect(route('transaction.show', ['transaction' => $paymentConfirmation->plant_tree_transaction_id]));
    }
}
