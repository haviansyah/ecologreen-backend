<?php

namespace App\Http\Controllers\API\TanamPohon;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankAccountResource;
use App\Http\Resources\TransactionResource;
use App\Models\BankAccount;
use App\Models\PaymentStatus;
use App\Models\PlantTreeTransaction;
use App\Models\TreeCatalog;
use App\Models\User;
use App\Notifications\Admin\TanamPohon\NewTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function App\Http\Helpers\notifyAdmin;

use const App\Http\Helpers\STATUS_PUBLISH;

class TanamPohonTransactionController extends BaseController
{
    /**
     * @method generate_code
     * @return String
     */
    public function generate_code(){
        return 'TP-'.strtoupper(Str::random(5));
    }

    /**
     * 
     * @method store() Store Transaction
     * POST api/tanam-pohon/transaction
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        /** @var User */
        $user = auth()->user();
        $transaction = new PlantTreeTransaction();

        $transaction->code = $this->generate_code();
        $transaction->user_id = $user->id;
        $transaction->tree_catalog_id = $request->get('tree_catalog_id');

        $transaction->quantity = $request->get('quantity');

        /** @var TreeCatalog */
        $treeCatalog = TreeCatalog::findOrFail($request->get('tree_catalog_id'));

        $transaction->unit_price = $treeCatalog->price;

        $transaction->unique_code = rand(0,500);

        $transaction->payment_method_id = $request->get('payment_method_id');

        $transaction->payment_status_id = PaymentStatus::WAITING;

        $transaction->save();

        notifyAdmin(new NewTransaction($transaction));

        return $this->sendResponse([
            'transaction_code' => $transaction->code,
            'id' => $transaction->id
        ],'Transaction success created.');
        
    }

    /**
     * 
     * @method index() Store Transaction
     * GET api/tanam-pohon/transaction
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function index(){
        /** @var User */
        $user = auth()->user();
        $transaction = PlantTreeTransaction::whereUserId($user->id)->get();
        return $this->sendResponse(TransactionResource::collection($transaction));
    }


    /**
     * 
     * @method show() Store Transaction
     * POST api/tanam-pohon/transaction/id
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        /** @var PlantTreeTransaction */
        $transaction = PlantTreeTransaction::findOrFail($id);
        $bank_accounts = BankAccount::whereStatus(STATUS_PUBLISH)->get();

        $bank_account_response = BankAccountResource::collection($bank_accounts);

        /** 
         * Calculate Payment Total
         */

        $total_price = ($transaction->quantity * $transaction->unit_price) + $transaction->unique_code;

        return $this->sendResponse([
            'id' => $transaction->id,
            'code' => $transaction->code,
            'created_at' => $transaction->created_at->format('d M Y H:i'),
            'due_date' => $transaction->due_date->format('d M Y H:i'),
            'order_name' => $transaction->treeCatalog->treeSpecies->local_name." (".$transaction->treeCatalog->treeSpecies->scientific_name.")",
            'quantity' => (int) $transaction->quantity,
            'unit_price' => (float) $transaction->unit_price,
            'unique_code' => (float) $transaction->unique_code,
            'total_price' => (float) $total_price,
            'status_name' => $transaction->paymentStatus->name,
            'status_id' => (int) $transaction->paymentStatus->id,
            "bank_accounts" => $bank_account_response
        ],'success');
    }
}
