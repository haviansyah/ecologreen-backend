<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\PlantTreeTransactionDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\PaymentStatus;
use App\Models\PlantTreeTransaction;
use App\Models\Tree;
use Illuminate\Http\Request;

class PlantTreeTransactionController extends BaseAdminController
{
    protected $model = PlantTreeTransaction::class;
    protected $view = 'tanam-pohon.transaction';
    protected $rule = [
        'tree_species_id' => 'required',
        'plant_location_id' => 'required',
        'status' => 'required',
    ];
    protected $route = 'transaction';

    public function index(PlantTreeTransactionDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.transaction.index');
    }

    public function show($id)
    {
        /** @var PlantTreeTransaction */
        $data = PlantTreeTransaction::findOrFail($id);

        $trees = Tree::doesntHave('transaction')
            ->whereTreeSpeciesId($data->treeCatalog->tree_species_id)
            ->wherePlantLocationId($data->treeCatalog->plant_location_id)
            ->get();
        return view('admin.tanam-pohon.transaction.detail', compact('data', 'trees'));
    }

    public function update(Request $request, $id)
    {
        /** @var PlantTreeTransaction */
        $data = PlantTreeTransaction::findOrFail($id);
        $action = $request->get('action');
        switch ($action) {
            case "CONFIRM":
                $data->payment_status_id = PaymentStatus::APPROVED;
                break;
            case "PENDING":
                $data->payment_status_id = PaymentStatus::PENDING;
                break;
            case "DECLINE":
                $data->payment_status_id = PaymentStatus::CANCELED;
                break;
        }
        $data->save();
        /** TODO: Notify Customer */

        return redirect()->back()->with('message', 'Payment Status Successfully Updated');
    }

    public function addTree(Request $request, $id)
    {
        /** @var PlantTreeTransaction */
        $transaction = PlantTreeTransaction::findOrFail($id);

        $trees = $request->get('trees');

        $transaction->trees()->attach($trees);
        return redirect()->back()->with('message', 'Trees Successfully Marked');
    }

    public function removeTree($id, $tree)
    {
        /** @var PlantTreeTransaction */
        $transaction = PlantTreeTransaction::findOrFail($id);
        $transaction->trees()->detach($tree);
        return redirect()->back()->with('message', 'Trees Successfully Unmarked');
    }
}
