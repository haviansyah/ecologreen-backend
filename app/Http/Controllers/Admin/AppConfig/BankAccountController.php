<?php

namespace App\Http\Controllers\Admin\AppConfig;

use App\DataTables\AppConfig\BankAccountDataTable;
use App\DataTables\TanamPohon\TreeCatalogDataTable;
use App\Http\Controllers\Admin\BaseAdminController;

use App\Http\Helpers\FileHelper;
use App\Models\BankAccount;
use App\Models\File;
use App\Models\TreeCatalog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

use function App\Http\Helpers\rupiahToInteger;

class BankAccountController extends BaseAdminController
{
    protected $model = BankAccount::class;
    protected $view = 'app-config.bank-account';
    protected $rule = [
        'bank_name' => 'required',
    ];
    protected $route = 'bank-account';

    public function index(BankAccountDataTable $dataTable)
    {
        return $dataTable->render('admin.app-config.bank-account.index');
    }

    public function edit(Request $request, $id)
    {
        $model_data = $this->model::with('image')->findOrFail($id);

        if($request->isJson()){
            return response()->json($model_data);
        }
        return view("admin.$this->view.input",compact("model_data"));
    }

    public function store(Request $request)
    {
        $request->validate($this->rule);
        /** @var BankAccount $data */
        $data = new $this->model($request->except('photo','file'));
        $photo = $request->get('photo');

        $file = FileHelper::uplodBase64Image($photo);
        $data->file_id = $file->id;
        $data->save();
        $file->unsetTemporary();

        return redirect(route("$this->route.index"))->with('message','Success create new record');;
    }

    public function update(Request $request, $id){

        $request->validate($this->rule);
        // dd($request->all());
        /** @var BankAccount */
        $data = $this->model::findOrFail($id);
        $data->update($request->except(['_method','_token','photo','file']));


        $photo = $request->get('photo');
        if($photo){
            try {
                ImageManagerStatic::make($photo);
                $old_photo = $data->image;
             
                $file = FileHelper::uplodBase64Image($photo);
                $data->file_id = $file->id;
                $data->save();
                $file->unsetTemporary();
                if($old_photo){
                    $old_photo->delete();
                }
            } catch (\Exception $e) {

            }
        }

        return redirect(route("$this->route.index"))->with('message','Success updating data');

    }


    public function destroy($id)
    {
        /** @var BankAccount */
        $data = $this->model::findOrFail($id);
        if($data->image){
            $data->image->delete();
        }
        $data->delete();
        return redirect(route("$this->route.index"))->with('message','Success remove data');;
    }
}
