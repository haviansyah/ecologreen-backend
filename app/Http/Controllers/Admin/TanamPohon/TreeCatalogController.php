<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\TreeCatalogDataTable;
use App\Http\Controllers\Admin\BaseAdminController;

use App\Http\Helpers\FileHelper;
use App\Models\File;
use App\Models\TreeCatalog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

use function App\Http\Helpers\rupiahToInteger;

class TreeCatalogController extends BaseAdminController
{
    protected $model = TreeCatalog::class;
    protected $view = 'tanam-pohon.tree-catalog';
    protected $rule = [
        'tree_species_id' => 'required',
        'plant_location_id' => 'required',
        'status' => 'required',
    ];
    protected $route = 'tree-catalog';

    public function index(TreeCatalogDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.tree-catalog.index');
    }

    public function edit(Request $request, $id)
    {
        $model_data = $this->model::with('images')->findOrFail($id);

        if($request->isJson()){
            return response()->json($model_data);
        }
        return view("admin.$this->view.input",compact("model_data"));
    }

    public function store(Request $request)
    {
        $request->validate($this->rule);
        /** @var TreeCatalog $data */
        $data = new $this->model($request->except('price','photos','file'));
        $data->price = rupiahToInteger($request->get('price'));
        $data->save();

        $photos = $request->get('photos');
        foreach($photos as $photo){
            $file = FileHelper::uplodBase64Image($photo);
            $data->images()->attach($file);
            $file->unsetTemporary();
        }
        return redirect(route("$this->route.index"))->with('message','Success create new record');;
    }

    public function update(Request $request, $id){

        $request->validate($this->rule);
        // dd($request->all());
        /** @var TreeCatalog */
        $data = $this->model::findOrFail($id);
        $data->update($request->except(['_method','_token','price','photos','file','deletes']));


        $photos = $request->get('photos');
        if($photos){
            foreach($photos as $photo){
                try {
                    ImageManagerStatic::make($photo);
                    $file = FileHelper::uplodBase64Image($photo);
                    $data->images()->attach($file);
                    $file->unsetTemporary();
                } catch (\Exception $e) {
                    continue;
                }
             
            }
        }
       
        $deletes = $request->get('deletes');
        if($deletes){
            foreach($deletes as $delete){
                $file = File::whereFileAddress($delete)->first();
                $data->images()->detach($file);
                $file->delete();
            }
        }

        $data->price = rupiahToInteger($request->get('price'));
        $data->save();
        return redirect(route("$this->route.index"))->with('message','Success updating data');

    }


    public function destroy($id)
    {

        /** @var TreeCatalog */
        $data = $this->model::findOrFail($id);
        if($data->images){
            foreach($data->images as $image){
                $image->delete();
            }
        }
        $data->delete();
        return redirect(route("$this->route.index"))->with('message','Success remove data');;
    }
}
