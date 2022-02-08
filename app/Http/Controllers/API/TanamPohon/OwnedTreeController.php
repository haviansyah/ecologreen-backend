<?php

namespace App\Http\Controllers\API\TanamPohon;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\MyTreeResource;
use App\Http\Resources\TrackingResource;
use App\Models\PaymentStatus;
use App\Models\PlantTreeTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnedTreeController extends BaseController
{
    /**
     * GET /api/tanam-pohon/my-tree
     * @return Illuminate\Http\Response
     */
    public function myTree(){
        /** @var User */
        $user = auth()->user();

        $transactions = PlantTreeTransaction::
            whereUserId($user->id)
            ->wherePaymentStatusId(PaymentStatus::APPROVED)->get();

        $query = DB::table('plant_tree_transactions as tr')
        ->addSelect(DB::raw("SUM(`ts`.`sequestration` * tr.quantity) AS sequestration"))
        ->addSelect(DB::raw("SUM(tr.quantity) AS quantity"))
        ->join('tree_catalogs as tc','tc.id','tr.tree_catalog_id')
        ->join('tree_species as ts','ts.id','tc.tree_species_id')
        ->where('tr.user_id',$user->id)
        ->where('tr.payment_status_id',PaymentStatus::APPROVED)
        ->get();
        return $this->sendResponse([
            'estimation' => [
               "sequestration" => (float) $query[0]->sequestration,
               "quantity" => (int)  $query[0]->quantity,
            ],
            'trees' => MyTreeResource::collection($transactions)
        ]);
    }

      /**
     * GET /api/tanam-pohon/tree-tracking
     * @return Illuminate\Http\Response
     */
    public function treeTracking(Request $request){
        /** @var User */
        $user = auth()->user();

        return $this->sendResponse(TrackingResource::collection($user->trees()->get()));
    }
}
