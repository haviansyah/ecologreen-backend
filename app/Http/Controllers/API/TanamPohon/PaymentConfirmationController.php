<?php

namespace App\Http\Controllers\API\TanamPohon;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use App\Models\PlantTreeTransaction;
use App\Notifications\Admin\TanamPohon\NewConfirmation;
use Illuminate\Http\Request;

use function App\Http\Helpers\notifyAdmin;

class PaymentConfirmationController extends BaseController
{
    /**
     * 
     * @method store() Store Transaction
     * POST api/tanam-pohon/confirmation
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        /** @var PlantTreeTransaction */
        $transaction = PlantTreeTransaction::findOrFail($request->get('id'));

        /**
         * Create New Confirmation
         */
        $paymentConfirmation =  PaymentConfirmation::create([
            'plant_tree_transaction_id' => $transaction->id,
            'payment_total' => $request->get('payment_total'),
            'transaction_date' => $request->get('transaction_date'),
            'note' => $request->get('note'),
            'bank_account_id' => $request->get('bank_account_id'),
        ]);

        notifyAdmin(new NewConfirmation());
        
        return $this->sendResponse([
            'id' => $paymentConfirmation->id
        ],'success');
        
    }

  

}
