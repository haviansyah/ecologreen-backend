<?php

namespace App\Http\Controllers\Admin\AppConfig;

use App\DataTables\AppConfig\PaymentMethodDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Helpers\FileHelper;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class PaymentMethodController extends BaseAdminController
{
    protected $model = PaymentMethod::class;
    protected $view = 'app-config.payment-method';
    protected $rule = [
        'name' => 'required',
    ];
    protected $route = 'payment-method';

    public function index(PaymentMethodDataTable $dataTable)
    {
        return $dataTable->render('admin.app-config.payment-method.index');
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
        /** @var PaymentMethod $data */
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
        /** @var PaymentMethod */
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
        /** @var PaymentMethod */
        $data = $this->model::findOrFail($id);
        if($data->image){
            $data->image->delete();
        }
        $data->delete();
        return redirect(route("$this->route.index"))->with('message','Success remove data');;
    }
}
